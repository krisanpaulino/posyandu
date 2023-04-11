<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medianbbperpb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medianbbperpb_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'medianbbperpb_pb' => [
                'type' => 'FLOAT',
            ],
            'medianbbperpb_l' => [
                'type' => 'FLOAT',
            ],
            'medianbbperpb_p' => [
                'type' => 'FLOAT'
            ]
        ]);
        $this->forge->addPrimaryKey('medianbbperpb_id');
        $this->forge->createTable('medianbbperpb');
    }

    public function down()
    {
        $this->forge->dropTable('medianbbperpb');
    }
}
