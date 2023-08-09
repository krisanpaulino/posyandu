<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengumuman_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pengumuman_judul' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'pengumuman_isi' => [
                'type' => 'TEXT',
            ],
            'posyandu_id' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ]);
        $this->forge->addPrimaryKey('pengumuman_id');
        $this->forge->addForeignKey('posyandu_id', 'posyandu', 'posyandu_id', 'cascade', 'cascade');
        $this->forge->createTable('pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman');
    }
}
