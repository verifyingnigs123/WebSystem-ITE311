<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    public function dashboard()
    {
        $session = session();
        
        // Check if user is logged in and is a teacher
        if (!$session->get('isLoggedIn') || $session->get('userRole') !== 'teacher') {
            return redirect()->to(base_url('login'));
        }
        
        $data = [
            'title' => 'Teacher Dashboard',
            'userRole' => $session->get('userRole'),
            'userEmail' => $session->get('userEmail')
        ];
        
        return view('teacher_dashboard', $data);
    }
}