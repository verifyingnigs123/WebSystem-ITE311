<?php

namespace App\Controllers;

use App\Models\MaterialModel;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class Materials extends BaseController
{
    protected $materialModel;
    protected $courseModel;
    protected $enrollmentModel;

    public function __construct()
    {
        $this->materialModel = new MaterialModel();
        $this->courseModel = new CourseModel();
        $this->enrollmentModel = new EnrollmentModel();
    }

    // -----------------------------------------------------------
    // UPLOAD + FETCH MATERIALS (teacher and student shared)
    // -----------------------------------------------------------
    public function upload($course_id)
    {
        $session = session();
        $userRole = $session->get('userRole');
        $userId = $session->get('user_id');

        $course = $this->courseModel->find($course_id);
        if (!$course) {
            return $this->response->setJSON(['error' => 'Course not found']);
        }

        // 🟢 Handle AJAX (student fetch)
        if ($this->request->isAJAX()) {
            $materials = $this->materialModel->getMaterialsByCourse($course_id);
            return $this->response->setJSON($materials);
        }

        // 🟣 Handle teacher upload
        if ($this->request->getMethod() === 'POST' && $userRole === 'teacher') {
            $file = $this->request->getFile('material_file');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $uploadPath = 'uploads/materials/';

                if (!is_dir(FCPATH . $uploadPath)) {
                    mkdir(FCPATH . $uploadPath, 0777, true);
                }

                $file->move(FCPATH . $uploadPath, $newName);

                $this->materialModel->insert([
                    'course_id'  => $course_id,
                    'file_name'  => $file->getClientName(),
                    'file_path'  => $uploadPath . $newName,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return redirect()->to(base_url("admin/course/{$course_id}/upload"))
                                 ->with('success', 'Material uploaded successfully!');
            } else {
                return redirect()->back()->with('error', 'File upload failed.');
            }
        }

        // 🟡 Default view for teachers (upload page)
        $materials = $this->materialModel->getMaterialsByCourse($course_id);

        return view('materials/upload', [
            'course' => $course,
            'materials' => $materials
        ]);
    }

    // -----------------------------------------------------------
    // DELETE MATERIAL
    // -----------------------------------------------------------
    public function delete($id)
    {
        $material = $this->materialModel->find($id);
        if (!$material) {
            return redirect()->back()->with('error', 'Material not found.');
        }

        if (file_exists(FCPATH . $material['file_path'])) {
            unlink(FCPATH . $material['file_path']);
        }

        $this->materialModel->delete($id);
        return redirect()->back()->with('success', 'Material deleted successfully.');
    }

    // -----------------------------------------------------------
    // DOWNLOAD MATERIAL
    // -----------------------------------------------------------
    public function download($id)
    {
        $material = $this->materialModel->find($id);

        if (!$material || !file_exists(FCPATH . $material['file_path'])) {
            return redirect()->back()->with('error', 'File not found.');
        }

        return $this->response
            ->download(FCPATH . $material['file_path'], null, true)
            ->setFileName($material['file_name']);
    }
}
