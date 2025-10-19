<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class Teacher extends BaseController
{
    protected $courseModel;
    protected $enrollmentModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->enrollmentModel = new EnrollmentModel();
    }

    /**
     * Display add course page
     */
    public function addCourse()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        if ($userRole !== 'teacher') {
            return redirect()->to('/dashboard');
        }

        return view('teacher/add_course');
    }

    /**
     * Display manage courses page
     */
    public function manageCourses()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        if ($userRole !== 'teacher') {
            return redirect()->to('/dashboard');
        }

        return view('teacher/manage_courses');
    }

    /**
     * Display manage students page
     */
    public function manageStudents()
    {
        // Check if user is logged in and is a teacher
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userRole = session()->get('userRole');
        if ($userRole !== 'teacher') {
            return redirect()->to('/dashboard');
        }

        return view('teacher/manage_students');
    }
}
