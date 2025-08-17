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
                'password' => password_hash('123456', PASSWORD_DEFAULT),
            ],
            [
                'username' => 'testuser',
                'email'    => 'test@example.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
            ],
        ];

        // Insert multiple users
        $this->db->table('users')->insertBatch($data);
    }
}
