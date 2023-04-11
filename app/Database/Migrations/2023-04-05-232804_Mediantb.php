<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mediantb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mediantb_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'mediantb_umur' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'mediantb_l' => [
                'type' => 'FLOAT',
            ],
            'mediantb_p' => [
                'type' => 'FLOAT'
            ]
        ]);
        $this->forge->addPrimaryKey('mediantb_id');
        $this->forge->createTable('mediantb');
    }

    public function down()
    {
        $this->forge->dropTable('mediantb');
    }
}
