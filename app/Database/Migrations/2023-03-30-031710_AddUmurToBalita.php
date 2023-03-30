<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUmurToBalita extends Migration
{
    public function up()
    {
        $this->forge->addColumn('balita', [
            'balita_umur' => [
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
