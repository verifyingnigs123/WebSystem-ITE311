<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddActivePendingToEnrollmentsStatus extends Migration
{
    public function up()
    {
        // Modify the status column to include 'active' and 'pending'
        $this->forge->modifyColumn('enrollments', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['enrolled', 'completed', 'dropped', 'active', 'pending'],
                'default'    => 'enrolled',
            ],
        ]);
    }

    public function down()
    {
        // Revert back to original status values
        $this->forge->modifyColumn('enrollments', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['enrolled', 'completed', 'dropped'],
                'default'    => 'enrolled',
            ],
        ]);
    }
}
