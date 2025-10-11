<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeacherCourseSeeder extends Seeder
{
    public function run()
    {
        // First, create a teacher user if it doesn't exist
        $userModel = new \App\Models\UserModel();
        
        // Check if teacher exists
        $teacher = $userModel->where('email', 'teacher@example.com')->first();
        
        if (!$teacher) {
            $teacherId = $userModel->insert([
                'name' => 'John Teacher',
                'email' => 'teacher@example.com',
                'role' => 'teacher',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
            ]);
        } else {
            $teacherId = $teacher['id'];
        }
        
        // Create sample courses for the teacher
        $courseModel = new \App\Models\CourseModel();
        
        $courses = [
            [
                'course_code' => 'CS101',
                'course_name' => 'Introduction to Programming',
                'description' => 'Learn the fundamentals of programming with Python and basic algorithms.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'course_code' => 'CS201',
                'course_name' => 'Web Development',
                'description' => 'Build modern web applications using HTML, CSS, JavaScript, and PHP.',
                'units' => 4,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'course_code' => 'CS301',
                'course_name' => 'Database Management',
                'description' => 'Learn database design, SQL, and database administration.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        
        foreach ($courses as $course) {
            // Check if course already exists
            $existingCourse = $courseModel->where('course_code', $course['course_code'])->first();
            
            if (!$existingCourse) {
                $courseModel->insert($course);
            }
        }
        
        echo "Teacher and sample courses created successfully!\n";
    }
}
