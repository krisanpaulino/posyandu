<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBalitaIDToHasil extends Migration
{
    public function up()
    {
        $this->forge->addColumn('hasilukur', [
            'balita_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'CONSTRAINT hasilukur_balita_id_foreign_key FOREIGN KEY (balita_id) REFERENCES balita(balita_id) on delete cascade on update cascade'
        ]);
    }

    public function down()
    {
        //
    }
}
