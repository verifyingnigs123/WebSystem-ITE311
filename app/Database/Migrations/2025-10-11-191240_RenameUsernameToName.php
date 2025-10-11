<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameUsernameToName extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('users', [
            'username' => [
                'name' => 'name',
                'type' => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('users', [
            'name' => [
                'name' => 'username',
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ]
        ]);
    }
}
