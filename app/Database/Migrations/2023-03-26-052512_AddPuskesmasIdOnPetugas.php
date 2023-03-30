<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPuskesmasIdOnPetugas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('petugas', [
            'posyandu_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'CONSTRAINT petugas_posyandu_id_foreign_key FOREIGN KEY (posyandu_id) REFERENCES posyandu(posyandu_id) on delete cascade'
        ]);
    }

    public function down()
    {
        //
    }
}
