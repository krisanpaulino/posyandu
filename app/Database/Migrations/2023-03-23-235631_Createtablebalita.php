<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtablebalita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'balita_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'balita_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'balita_jk' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P']
            ],
            'balita_tgllahir' => [
                'type' => 'DATE',
            ],
            'balita_orangtua' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'balita_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'posyandu_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('balita_id');
        $this->forge->addForeignKey('posyandu_id', 'posyandu', 'posyandu_id', 'cascade', 'cascade');
        $this->forge->createTable('balita');
    }

    public function down()
    {
        $this->forge->dropTable('balita');
    }
}
