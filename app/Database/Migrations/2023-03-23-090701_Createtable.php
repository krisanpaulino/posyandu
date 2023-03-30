<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'petugas_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'petugas_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'petugas_jk' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'petugas_tempatlahir' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'petugas_tgllahir' => [
                'type' => 'DATE'
            ],
            'petugas_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'petugas_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '12'
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('petugas_id');
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'cascade', 'cascade');
        $this->forge->createTable('petugas');
    }

    public function down()
    {
        $this->forge->dropTable('petugas');
    }
}
