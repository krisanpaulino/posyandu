<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosisitomedianimt extends Migration
{
    public function up()
    {
        $this->forge->addColumn('medianimt', [
            'posisi' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'H']
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
