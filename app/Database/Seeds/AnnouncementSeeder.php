<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Welcome to the New Academic Year 2025-2026',
                'content' => 'We are excited to welcome all students, teachers, and staff to the new academic year. This semester promises to be filled with exciting learning opportunities, new courses, and innovative teaching methods. Please ensure you have completed your course enrollments and are familiar with the updated academic calendar.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            [
                'title' => 'Important: Midterm Examination Schedule',
                'content' => 'The midterm examinations are scheduled to begin next week. Please check your individual course schedules and ensure you are prepared. All students are reminded to bring their student IDs and arrive at least 15 minutes before the scheduled exam time. Good luck to everyone!',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
            ]
        ];

        $this->db->table('announcements')->insertBatch($data);
    }
}
