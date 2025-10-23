<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        // Get teacher and students
        $teacher = $this->db->table('users')
            ->where('email', 'teacher@gmail.com')
            ->get()
            ->getRowArray();

        $students = $this->db->table('users')
            ->where('role', 'student')
            ->get()
            ->getResultArray();

        if (!$teacher) {
            echo "Teacher not found. Please run UserSeeder first.\n";
            return;
        }

        if (empty($students)) {
            echo "No students found. Please run UserSeeder first.\n";
            return;
        }

        // Get courses created by the teacher
        $courses = $this->db->table('courses')
            ->where('teacher_id', $teacher['id'])
            ->get()
            ->getResultArray();

        if (empty($courses)) {
            echo "No courses found for teacher. Please run CourseSeeder or TeacherCourseSeeder first.\n";
            return;
        }

        $enrollments = [];

        // Enroll students in courses - create more enrollments
        foreach ($students as $student) {
            // Each student enrolls in all available courses
            foreach ($courses as $course) {
                // Check if already enrolled
                $existing = $this->db->table('enrollments')
                    ->where('user_id', $student['id'])
                    ->where('course_id', $course['course_id'])
                    ->get()
                    ->getRowArray();

                if (!$existing) {
                    $enrollments[] = [
                        'user_id' => $student['id'],
                        'course_id' => $course['course_id'],
                        'enrollment_date' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 30) . ' days')),
                        'status' => 'enrolled',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                }
            }
        }

        // Insert enrollments
        if (!empty($enrollments)) {
            $this->db->table('enrollments')->insertBatch($enrollments);
            echo count($enrollments) . " enrollments created successfully!\n";
        } else {
            echo "No new enrollments to create.\n";
        }
    }
}
