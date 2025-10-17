<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');


// routes for login register and dashboard
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Auth::dashboard');

// Announcements route
$routes->get('/announcements', 'Announcement::index');

// Role-based dashboard routes (protected by RoleAuth filter)
$routes->get('/teacher/dashboard', 'Teacher::dashboard', ['filter' => 'roleauth']);
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'roleauth']);

// Course enrollment routes
$routes->post('/course/enroll', 'Course::enroll');
$routes->get('/course/enrolled', 'Course::getEnrolledCourses');
$routes->get('/course/available', 'Course::getAvailableCourses');

// Course management routes (for teachers)
$routes->post('/course/create', 'Course::create');
$routes->get('/course/teacher-courses', 'Course::getTeacherCourses');
$routes->get('/course/all-available', 'Course::getAllAvailableCourses');

// Teacher dashboard routes (protected by RoleAuth filter)
$routes->get('/teacher/add-course', 'Teacher::addCourse', ['filter' => 'roleauth']);
$routes->get('/teacher/manage-courses', 'Teacher::manageCourses', ['filter' => 'roleauth']);
$routes->get('/teacher/manage-students', 'Teacher::manageStudents', ['filter' => 'roleauth']);
$routes->post('/course/update/(:num)', 'Course::update/$1');
$routes->post('/course/delete/(:num)', 'Course::delete/$1');
$routes->get('/course/get/(:num)', 'Course::get/$1');
$routes->get('/course/getTeacherStudents', 'Course::getTeacherStudents');
$routes->get('/course/getStudentDetails/(:num)', 'Course::getStudentDetails/$1');