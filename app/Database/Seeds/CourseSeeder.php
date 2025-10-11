<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Get teacher user ID
        $teacher = $this->db->table('users')
            ->where('email', 'teacher@example.com')
            ->get()
            ->getRowArray();
        
        if (!$teacher) {
            echo "Teacher user not found. Please run UserSeeder first.\n";
            return;
        }
        
        $data = [
            [
                'course_code' => 'CS101',
                'course_name' => 'Introduction to Computer Science',
                'description' => 'Basic concepts of computer science and programming fundamentals.',
                'units' => 3,
                'teacher_id' => $teacher['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'course_code' => 'MATH201',
                'course_name' => 'Calculus I',
                'description' => 'Introduction to differential and integral calculus.',
                'units' => 4,
                'teacher_id' => $teacher['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'course_code' => 'ENG101',
                'course_name' => 'English Composition',
                'description' => 'Fundamentals of writing and communication.',
                'units' => 3,
                'teacher_id' => $teacher['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'course_code' => 'PHYS101',
                'course_name' => 'General Physics',
                'description' => 'Basic principles of mechanics, thermodynamics, and waves.',
                'units' => 4,
                'teacher_id' => $teacher['id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        // Insert courses
        $this->db->table('courses')->insertBatch($data);
        
        echo "Test courses created successfully!\n";
    }
}