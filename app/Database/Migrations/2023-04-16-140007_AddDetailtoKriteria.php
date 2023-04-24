<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDetailtoKriteria extends Migration
{
    public function up()
    {
        $this->forge->addColumn('kriteria', [
            'kriteria_detail' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
