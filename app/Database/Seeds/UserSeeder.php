<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'teacher1',
                'email'    => 'teacher@example.com',
                'password' => password_hash('teacher', PASSWORD_DEFAULT),
                'role'     => 'teacher',
            ],
            [
                'username' => 'student1',
                'email'    => 'student@example.com',
                'password' => password_hash('student', PASSWORD_DEFAULT),
                'role'     => 'student',
            ],
        ];

        // Insert multiple users
        $this->db->table('users')->insertBatch($data);
    }
}
