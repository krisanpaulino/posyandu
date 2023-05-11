<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddumurHasilukur extends Migration
{
    public function up()
    {
        $this->forge->addColumn('hasilukur', [
            'hasilukur_umur' => [
                'type' => 'INT',
                'constraint' => 2
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
