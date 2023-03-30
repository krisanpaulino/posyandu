<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPetugasFoto extends Migration
{
    public function up()
    {
        $this->forge->addColumn('petugas', [
            'petugas_foto' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
