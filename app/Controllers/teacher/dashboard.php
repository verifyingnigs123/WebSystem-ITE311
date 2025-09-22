<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('teacher/dashboard', [
            'title' => 'Teacher Dashboard'
        ]);
    }
}
