<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusGizi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'statusgizi_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'statusgizi_min' => [
                'type' => 'FLOAT',
            ],
            'statusgizi_max' => [
                'type' => 'FLOAT',
            ],
            'statusgizi_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'statusgizi_penyebab' => [
                'type' => 'TEXT'
            ],
            'statusgizi_pencegahan' => [
                'type' => 'TEXT'
            ],
            'statusgizi_pengobatan' => [
                'type' => 'TEXT'
            ]

        ]);
        $this->forge->addPrimaryKey('statusgizi_id');
        $this->forge->createTable('statusgizi');
    }

    public function down()
    {
        $this->forge->dropTable('statusgizi');
    }
}
