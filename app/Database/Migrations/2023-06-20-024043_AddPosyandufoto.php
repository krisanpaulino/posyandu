<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosyandufoto extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posyandu', [
            'posyandu_foto' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'default' => null
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
