<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrateDusun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'posyandu_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'posyandu_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addPrimaryKey('posyandu_id');
        $this->forge->createTable('posyandu');
    }

    public function down()
    {
        $this->forge->dropTable('posyandu');
    }
}
