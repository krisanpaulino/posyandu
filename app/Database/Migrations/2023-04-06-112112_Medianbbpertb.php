<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medianbbpertb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medianbbpertb_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'medianbbpertb_tb' => [
                'type' => 'FLOAT',
            ],
            'medianbbpertb_l' => [
                'type' => 'FLOAT',
            ],
            'medianbbpertb_p' => [
                'type' => 'FLOAT'
            ]
        ]);
        $this->forge->addPrimaryKey('medianbbpertb_id');
        $this->forge->createTable('medianbbpertb');
    }

    public function down()
    {
        $this->forge->dropTable('medianbbpertb');
    }
}
