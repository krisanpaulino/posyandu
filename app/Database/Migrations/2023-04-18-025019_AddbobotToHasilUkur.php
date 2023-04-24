<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddbobotToHasilUkur extends Migration
{
    public function up()
    {
        $this->forge->addColumn('hasilukur', [
            'hasilukur_c1bobot' => [
                'type' => 'FLOAT',
            ],
            'hasilukur_c2bobot' => [
                'type' => 'FLOAT',
            ],
            'hasilukur_c3bobot' => [
                'type' => 'FLOAT',
            ],
            'hasilukur_c4bobot' => [
                'type' => 'FLOAT',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
