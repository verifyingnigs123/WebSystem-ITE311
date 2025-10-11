<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTeacherIdToCourses extends Migration
{
    public function up()
    {
        $this->forge->addColumn('courses', [
            'teacher_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'units'
            ]
        ]);
        
        $this->forge->addForeignKey('teacher_id', 'users', 'id', 'CASCADE', 'SET NULL');
    }

    public function down()
    {
        $this->forge->dropForeignKey('courses', 'courses_teacher_id_foreign');
        $this->forge->dropColumn('courses', 'teacher_id');
    }
}
