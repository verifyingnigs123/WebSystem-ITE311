<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('student/dashboard', [
            'title' => 'Student Dashboard'
        ]);
    }
}
