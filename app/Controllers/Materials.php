<?php

namespace App\Controllers;

use App\Models\MaterialModel;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class Materials extends BaseController
{
    // -----------------------------------------------------------
    // UPLOAD MATERIAL (Teacher upload + Student fetch)
    // -----------------------------------------------------------
public function upload($course_id)
{
    $session = session();
    $userRole = $session->get('userRole');
    $userId = $session->get('user_id');

    $materialModel = new MaterialModel();
    $courseModel = new CourseModel();
    $notificationModel = new \App\Models\NotificationModel(); // ✅ Include Notification Model
    $enrollmentModel = new EnrollmentModel(); // ✅ Used to notify enrolled students

    $course = $courseModel->find($course_id);
    if (!$course) {
        return $this->response->setJSON(['error' => 'Course not found']);
    }

    // 🟢 Handle AJAX request (student fetch)
    if ($this->request->isAJAX()) {
        $materials = $materialModel->getMaterialsByCourse($course_id);
        return $this->response->setJSON($materials);
    }

    // 🟣 Handle file upload (teacher)
    if ($this->request->getMethod() === 'POST' && $userRole === 'teacher') {
        $file = $this->request->getFile('material_file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = 'uploads/materials/';

            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }

            $file->move(FCPATH . $uploadPath, $newName);

            // Save material record
            $materialModel->insert([
                'course_id'  => $course_id,
                'file_name'  => $file->getClientName(),
                'file_path'  => $uploadPath . $newName,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            // ✅ Step 1: Notify all enrolled students
            $enrolledStudents = $enrollmentModel
                ->where('course_id', $course_id)
                ->findAll();

            $filename = $file->getClientName();

            foreach ($enrolledStudents as $student) {
                $notificationModel->insert([
                    'user_id' => $student['user_id'], // ✅ Correct key name
                    'message' => "New material <b>{$filename}</b> has been uploaded by your teacher in <b>{$course['course_name']}</b>.",
                    'is_read' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }

            // ✅ Step 2: Notify teacher (self-confirmation)
            $notificationModel->insert([
                'user_id' => $userId,
                'message' => "You successfully uploaded <b>{$filename}</b> to <b>{$course['course_name']}</b>.",
                'is_read' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to(base_url("admin/course/{$course_id}/upload"))
                             ->with('success', 'Material uploaded successfully and notifications sent!');
        } else {
            return redirect()->back()->with('error', 'File upload failed.');
        }
    }

    // 🟡 Default: show materials
    $materials = $materialModel->getMaterialsByCourse($course_id);
    return view('materials/upload', [
        'course' => $course,
        'materials' => $materials
    ]);
}

    // -----------------------------------------------------------
    // DELETE MATERIAL
    // -----------------------------------------------------------
    public function delete($material_id)
    {
        $materialModel = new MaterialModel();
        $material = $materialModel->find($material_id);

        if (!$material) {
            return redirect()->back()->with('error', 'Material not found.');
        }

        if (file_exists(FCPATH . $material['file_path'])) {
            unlink(FCPATH . $material['file_path']);
        }

        $materialModel->delete($material_id);
        return redirect()->back()->with('success', 'Material deleted successfully.');
    }

    // -----------------------------------------------------------
    // DOWNLOAD MATERIAL
    // -----------------------------------------------------------
    public function download($material_id)
    {
        $materialModel = new MaterialModel();
        $material = $materialModel->find($material_id);

        if (!$material || !file_exists(FCPATH . $material['file_path'])) {
            return redirect()->back()->with('error', 'File not found.');
        }

        return $this->response
            ->download(FCPATH . $material['file_path'], null, true)
            ->setFileName($material['file_name']);
    }
}
