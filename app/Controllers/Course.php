<?php

namespace App\Controllers;

use App\Models\EnrollmentModel;
use App\Models\CourseModel;

class Course extends BaseController
{
    protected $enrollmentModel;
    protected $courseModel;

    public function __construct()
    {
        $this->enrollmentModel = new EnrollmentModel();
        $this->courseModel = new CourseModel();
    }

    /**
     * Handle course enrollment via AJAX
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function enroll()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to enroll in courses.'
            ]);
        }

        // Get user ID from session
        $user_id = session()->get('user_id');
        
        // Get course ID from POST request
        $course_id = $this->request->getPost('course_id');

        // Validate course ID
        if (!$course_id || !is_numeric($course_id)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid course ID.'
            ]);
        }

        // Check if course exists
        $course = $this->courseModel->find($course_id);
        if (!$course) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Course not found.'
            ]);
        }

        // Check if user is already enrolled
        if ($this->enrollmentModel->isAlreadyEnrolled($user_id, $course_id)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You are already enrolled in this course.'
            ]);
        }

        // Prepare enrollment data
        $enrollmentData = [
            'user_id' => $user_id,
            'course_id' => $course_id,
            'enrollment_date' => date('Y-m-d H:i:s')
        ];

        // Insert enrollment record
        $enrollmentId = $this->enrollmentModel->enrollUser($enrollmentData);

        if ($enrollmentId) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Successfully enrolled in ' . $course['course_name'] . '!',
                'enrollment_id' => $enrollmentId
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to enroll in course. Please try again.'
            ]);
        }
    }

    /**
     * Get user's enrolled courses
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getEnrolledCourses()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to view enrolled courses.'
            ]);
        }

        $user_id = session()->get('user_id');
        $enrolledCourses = $this->enrollmentModel->getUserEnrollments($user_id);

        return $this->response->setJSON([
            'success' => true,
            'courses' => $enrolledCourses
        ]);
    }

    /**
     * Get available courses for user
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getAvailableCourses()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to view available courses.'
            ]);
        }

        $user_id = session()->get('user_id');
        $availableCourses = $this->enrollmentModel->getAvailableCourses($user_id);

        return $this->response->setJSON([
            'success' => true,
            'courses' => $availableCourses
        ]);
    }

    /**
     * Create a new course (for teachers)
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function create()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to create courses.'
            ]);
        }

        $userRole = session()->get('userRole');
        if ($userRole !== 'teacher') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Only teachers can create courses.'
            ]);
        }

        // Get form data
        $courseCode = trim($this->request->getPost('course_code'));
        $courseName = trim($this->request->getPost('course_name'));
        $description = trim($this->request->getPost('description'));
        $units = (int) $this->request->getPost('units');

        // Validate required fields
        if (empty($courseCode) || empty($courseName)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Course code and name are required.'
            ]);
        }

        // Check if course code already exists
        if ($this->courseModel->where('course_code', $courseCode)->first()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Course code already exists.'
            ]);
        }

        // Prepare course data
        $courseData = [
            'course_code' => $courseCode,
            'course_name' => $courseName,
            'description' => $description,
            'units' => $units ?: 3,
            'teacher_id' => session()->get('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insert course
        $courseId = $this->courseModel->insert($courseData);

        if ($courseId) {
            // Get the created course with teacher info for response
            $createdCourse = $this->courseModel->getCourseWithTeacher($courseId);
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Course "' . $courseName . '" created successfully!',
                'course_id' => $courseId,
                'course' => $createdCourse
            ]);
        } else {
            // Get the last error for debugging
            $errors = $this->courseModel->errors();
            $dbError = $this->db->error();
            $errorMessage = 'Failed to create course. Please try again.';
            
            if (!empty($errors)) {
                $errorMessage .= ' Model Error: ' . implode(', ', $errors);
            }
            
            if (!empty($dbError['message'])) {
                $errorMessage .= ' DB Error: ' . $dbError['message'];
            }
            
            // Log the error for debugging
            log_message('error', 'Course creation failed: ' . $errorMessage);
            log_message('error', 'Course data: ' . json_encode($courseData));
            
            return $this->response->setJSON([
                'success' => false,
                'message' => $errorMessage
            ]);
        }
    }

    /**
     * Get courses created by the current teacher
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getTeacherCourses()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to view courses.'
            ]);
        }

        $userRole = session()->get('userRole');
        if ($userRole !== 'teacher') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Only teachers can view their courses.'
            ]);
        }

        $teacherId = session()->get('user_id');
        $courses = $this->courseModel->getCoursesByTeacher($teacherId);

        return $this->response->setJSON([
            'success' => true,
            'courses' => $courses
        ]);
    }

    /**
     * Get all available courses (for testing purposes)
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function getAllAvailableCourses()
    {
        $courses = $this->courseModel->getAllCoursesWithTeachers();

        return $this->response->setJSON([
            'success' => true,
            'courses' => $courses
        ]);
    }
}
