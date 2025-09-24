<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // If already logged in
        if (session()->get('isAuthenticated')) {
            return redirect()->to('/dashboard');
        }

        // Handle POST (form submit)
        if ($this->request->getMethod() === 'POST') {
            $userEmail = $this->request->getPost('email');
            $userPassword = $this->request->getPost('password');

            if (empty($userEmail) || empty($userPassword)) {
                return redirect()->back()->with('login_error', 'Please provide both email and password.');
            }

            $userModel = new UserModel();
            $userRecord = $userModel->where('email', $userEmail)->first();

            if (!$userRecord) {
                return redirect()->back()->with('login_error', 'No account found with email: ' . $userEmail);
            }

            if (!password_verify($userPassword, $userRecord['password'])) {
                return redirect()->back()->with('login_error', 'Incorrect password.');
            }

            // Save session
            $userSession = [
                'userId'          => $userRecord['id'],
                'userName'        => $userRecord['name'],
                'userEmail'       => $userRecord['email'],
                'userRole'        => $userRecord['role'],
                'isAuthenticated' => true
            ];

            session()->set($userSession);

            return redirect()->to('/dashboard')->with('success', 'Welcome back, ' . $userRecord['name'] . '!');
        }

        // GET request: Show login form
        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }

    public function register()
    {
        if (session()->get('isAuthenticated')) {
            return redirect()->to('/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $fullName       = trim((string) $this->request->getPost('name'));
            $emailAddress   = trim((string) $this->request->getPost('email'));
            $newPassword    = (string) $this->request->getPost('password');
            $confirmPassword = (string) $this->request->getPost('password_confirm');

            if ($fullName === '' || $emailAddress === '' || $newPassword === '' || $confirmPassword === '') {
                return redirect()->back()->withInput()->with('register_error', 'All fields must be completed.');
            }

            if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                return redirect()->back()->withInput()->with('register_error', 'Please enter a valid email address.');
            }

            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->withInput()->with('register_error', 'Passwords do not match.');
            }

            $userModel = new UserModel();

            if ($userModel->where('email', $emailAddress)->first()) {
                return redirect()->back()->withInput()->with('register_error', 'This email is already in use.');
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $newUserId = $userModel->insert([
                'name'     => $fullName,
                'email'    => $emailAddress,
                'role'     => 'student',
                'password' => $hashedPassword,
            ], true);

            if (!$newUserId) {
                return redirect()->back()->withInput()->with('register_error', 'Account creation failed. Please try again.');
            }

            return redirect()->to('/login')->with('register_success', 'Registration successful. Please log in.');
        }

        return view('register');
    }

    public function dashboard()
{
    if (!session()->get('isAuthenticated')) {
        return redirect()->to('/login')->with('error', 'Please login first.');
    }

    $role     = session()->get('userRole');
    $userName = session()->get('userName');

    $data = [
        'title'    => 'Dashboard',
        'role'     => $role,
        'userName' => $userName,
    ];

    if ($role === 'admin') {
        $userModel     = new UserModel();
        $data['users'] = $userModel->findAll(); // Example for admin
    }
    // Student and teacher just use default $data

    return view('auth/dashboard', $data);
}

}
