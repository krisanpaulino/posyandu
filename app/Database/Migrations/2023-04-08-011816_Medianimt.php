<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medianimt extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medianimt_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'medianimt_umur' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'medianimt_l' => [
                'type' => 'FLOAT',
            ],
            'medianimt_p' => [
                'type' => 'FLOAT'
            ]
        ]);
        $this->forge->addPrimaryKey('medianimt_id');
        $this->forge->createTable('medianimt');
    }

    public function down()
    {
        $this->forge->dropTable('medianimt');
    }
}
