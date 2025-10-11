<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // First, get a teacher user ID (assuming there's at least one teacher)
        $teacher = $this->db->table('users')->where('role', 'teacher')->first();
        $teacherId = $teacher ? $teacher['id'] : 1; // Default to ID 1 if no teacher found

        $data = [
            [
                'course_code' => 'CS101',
                'course_name' => 'Introduction to Computer Science',
                'description' => 'Fundamental concepts of computer science including programming basics, algorithms, and data structures.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'course_code' => 'CS102',
                'course_name' => 'Web Development Fundamentals',
                'description' => 'Learn HTML, CSS, JavaScript and modern web development practices.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'course_code' => 'CS103',
                'course_name' => 'Database Management Systems',
                'description' => 'Introduction to database design, SQL, and database administration.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'course_code' => 'CS104',
                'course_name' => 'Software Engineering',
                'description' => 'Software development lifecycle, project management, and best practices.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'course_code' => 'CS105',
                'course_name' => 'Data Structures and Algorithms',
                'description' => 'Advanced data structures, algorithm analysis, and problem-solving techniques.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'course_code' => 'CS106',
                'course_name' => 'Mobile App Development',
                'description' => 'Cross-platform mobile app development using modern frameworks.',
                'units' => 3,
                'teacher_id' => $teacherId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert multiple courses
        $this->db->table('courses')->insertBatch($data);
    }
}
