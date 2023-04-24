<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kriteria_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kriteria_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 3
            ],
            'kriteria_bobot' => [
                'type' => 'FLOAT',
            ]
        ]);
        $this->forge->addPrimaryKey('kriteria_id');
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}
