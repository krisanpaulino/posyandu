<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ambangbatas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ambangbatas_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'ambangbatas_index' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'ambangbatas_status' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'ambangbatas_skormin' => [
                'type' => 'FLOAT'
            ],
            'ambangbatas_skormax' => [
                'type' => 'FLOAT'
            ]
        ]);

        $this->forge->addPrimaryKey('ambangbatas_id');
        $this->forge->createTable('ambangbatas');
    }

    public function down()
    {
        $this->forge->dropTable('ambangbatas');
    }
}
