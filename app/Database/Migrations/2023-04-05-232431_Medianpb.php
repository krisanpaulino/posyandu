<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medianpb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medianpb_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'medianpb_umur' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'medianpb_l' => [
                'type' => 'FLOAT',
            ],
            'medianpb_p' => [
                'type' => 'FLOAT'
            ]
        ]);
        $this->forge->addPrimaryKey('medianpb_id');
        $this->forge->createTable('medianpb');
    }

    public function down()
    {
        $this->forge->dropTable('medianpb');
    }
}
