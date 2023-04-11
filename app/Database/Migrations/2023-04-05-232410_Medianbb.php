<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medianbb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'medianbb_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'medianbb_umur' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'medianbb_l' => [
                'type' => 'FLOAT',
            ],
            'medianbb_p' => [
                'type' => 'FLOAT'
            ]
        ]);
        $this->forge->addPrimaryKey('medianbb_id');
        $this->forge->createTable('medianbb');
    }

    public function down()
    {
        $this->forge->dropTable('medianbb');
    }
}
