<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTeacherIdToCourses extends Migration
{
    public function up()
    {
        // Get the database connection
        $db = \Config\Database::connect();
        $fields = $db->getFieldNames('courses');

        // Only add the column if it doesn't already exist
        if (!in_array('teacher_id', $fields)) {
            $this->forge->addColumn('courses', [
                'teacher_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                    'after'      => 'units',
                ]
            ]);

            // Add foreign key
            $this->db->query('ALTER TABLE courses 
                ADD CONSTRAINT fk_courses_teacher_id 
                FOREIGN KEY (teacher_id) REFERENCES users(id) 
                ON DELETE CASCADE ON UPDATE SET NULL;');
        }
    }

    public function down()
    {
        // Drop the foreign key and column safely
        $db = \Config\Database::connect();
        $fields = $db->getFieldNames('courses');

        if (in_array('teacher_id', $fields)) {
            $this->forge->dropForeignKey('courses', 'fk_courses_teacher_id');
            $this->forge->dropColumn('courses', 'teacher_id');
        }
    }
}
