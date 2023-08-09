<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotifTgl extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pengumuman', [
            'pengumuman_tgl' => [
                'type' => 'DATETIME'
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
