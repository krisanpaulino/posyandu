<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtableperiode extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'periode_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'periode_bulan' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'periode_tahun' => [
                'type' => 'YEAR'
            ]
        ]);
        $this->forge->addPrimaryKey('periode_id');
        $this->forge->createTable('periode');
    }

    public function down()
    {
        $this->forge->dropTable('periode');
    }
}
