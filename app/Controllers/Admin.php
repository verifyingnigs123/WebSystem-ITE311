<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        $session = session();
        
        // Check if user is logged in and is an admin
        if (!$session->get('isLoggedIn') || $session->get('userRole') !== 'admin') {
            return redirect()->to(base_url('login'));
        }
        
        $data = [
            'title' => 'Admin Dashboard',
            'userRole' => $session->get('userRole'),
            'userEmail' => $session->get('userEmail')
        ];
        
        return view('admin_dashboard', $data);
    }
}
