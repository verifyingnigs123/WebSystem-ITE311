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

    /**
     * Display upload form and handle file upload
     *
     * @param int $course_id
     * @return mixed
     */
    public function upload($course_id)
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to upload materials.');
        }

        if (session()->get('userRole') !== 'teacher') {
            return redirect()->to('/dashboard')->with('error', 'Only teachers can upload materials.');
        }

        // Check if course exists and belongs to the teacher
        $course = $this->courseModel->where('course_id', $course_id)
                                   ->where('teacher_id', session()->get('user_id'))
                                   ->first();

        if (!$course) {
            return redirect()->to('/dashboard')->with('error', 'Course not found or access denied.');
        }

        if ($this->request->getMethod() === 'POST') {
            return $this->handleUpload($course_id);
        }

        // Display upload form
        $data = [
            'course' => $course,
            'materials' => $this->materialModel->getMaterialsByCourse($course_id),
        ];

        return view('teacher/upload_material', $data);
    }

    /**
     * Handle file upload process
     *
     * @param int $course_id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    private function handleUpload($course_id)
    {
        // Load upload library
        $file = $this->request->getFile('material_file');

        // Validate file
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Invalid file upload.');
        }

        // Check file type
        $allowedTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'txt', 'jpg', 'jpeg', 'png'];
        if (!in_array($file->getExtension(), $allowedTypes)) {
            return redirect()->back()->with('error', 'File type not allowed. Allowed types: PDF, DOC, DOCX, PPT, PPTX, TXT, JPG, JPEG, PNG.');
        }

        // Check file size (max 10MB)
        if ($file->getSize() > 10485760) { // 10MB in bytes
            return redirect()->back()->with('error', 'File size too large. Maximum size is 10MB.');
        }

        // Create upload directory if it doesn't exist
        $uploadPath = FCPATH . 'uploads/materials/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Generate unique filename
        $newName = $file->getRandomName();
        $filePath = 'uploads/materials/' . $newName;

        // Move file to upload directory
        if ($file->move($uploadPath, $newName)) {
            // Save to database
            $data = [
                'course_id' => $course_id,
                'file_name' => $file->getClientName(),
                'file_path' => $filePath,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if ($this->materialModel->insertMaterial($data)) {
                return redirect()->back()->with('success', 'Material uploaded successfully!');
            } else {
                // Delete uploaded file if database insert failed
                unlink($uploadPath . $newName);
                return redirect()->back()->with('error', 'Failed to save material information.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to upload file.');
        }
    }

    /**
     * Delete a material record and associated file
     *
     * @param int $material_id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($material_id)
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn') || session()->get('userRole') !== 'teacher') {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        // Get material details
        $material = $this->materialModel->getMaterialById($material_id);
        if (!$material) {
            return redirect()->to('/dashboard')->with('error', 'Material not found.');
        }

        // Check if teacher owns the course
        $course = $this->courseModel->where('course_id', $material['course_id'])
                                   ->where('teacher_id', session()->get('user_id'))
                                   ->first();

        if (!$course) {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        // Delete physical file
        $filePath = FCPATH . $material['file_path'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete database record
        if ($this->materialModel->deleteMaterial($material_id)) {
            return redirect()->back()->with('success', 'Material deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete material.');
        }
    }

    /**
     * Handle file download for enrolled students
     *
     * @param int $material_id
     * @return mixed
     */
    public function download($material_id)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to download materials.');
        }

        // Get material details
        $material = $this->materialModel->getMaterialById($material_id);
        if (!$material) {
            return redirect()->to('/dashboard')->with('error', 'Material not found.');
        }

        // Check if user is enrolled in the course (students only)
        if (session()->get('userRole') === 'student') {
            if (!$this->enrollmentModel->isUserEnrolled(session()->get('user_id'), $material['course_id'])) {
                return redirect()->to('/dashboard')->with('error', 'You must be enrolled in this course to download materials.');
            }
        } elseif (session()->get('userRole') === 'teacher') {
            // Teachers can download materials from their own courses
            $course = $this->courseModel->where('course_id', $material['course_id'])
                                       ->where('teacher_id', session()->get('user_id'))
                                       ->first();
            if (!$course) {
                return redirect()->to('/dashboard')->with('error', 'Access denied.');
            }
        } else {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }

        // Check if file exists
        $filePath = FCPATH . $material['file_path'];
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found on server.');
        }

        // Force download
        return $this->response->download($filePath, null, true)->setFileName($material['file_name']);
    }
    public function viewByCourse($course_id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login')->with('error', 'Please log in first.');
    }

    // Check enrollment
    if (session()->get('userRole') === 'student') {
        if (!$this->enrollmentModel->isUserEnrolled(session()->get('user_id'), $course_id)) {
            return redirect()->to('/dashboard')->with('error', 'Access denied.');
        }
    }

    $course = $this->courseModel->find($course_id);
    $materials = $this->materialModel->getMaterialsByCourse($course_id);

    return view('student/course_materials', [
        'course' => $course,
        'materials' => $materials
    ]);
}

}
