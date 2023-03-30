<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtableperiksa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'hasilukur_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'periode_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'hasilukur_tgl' => [
                'type' => 'DATE'
            ],
            'hasilukur_posisi' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'H']
            ],
            'hasilukur_bb' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_pbtb' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_bmi' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_c1' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_c2' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_c3' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_c4' => [
                'type' => 'FLOAT'
            ],
            'hasilukur_skor' => [
                'type' => 'FLOAT',
                'null' => true
            ],
            'hasilukur_status' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('hasilukur_id');
        $this->forge->addForeignKey('periode_id', 'periode', 'periode_id', 'cascade', 'cascade');
        $this->forge->createTable('hasilukur');
    }

    public function down()
    {
        $this->forge->dropTable('hasilukur');
    }
}
