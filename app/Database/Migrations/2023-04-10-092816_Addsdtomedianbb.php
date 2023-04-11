<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addsdtomedianbb extends Migration
{
    public function up()
    {
        $this->forge->addColumn('medianbb', [
            'medianbb_plus1l' => [
                'type' => 'FLOAT'
            ],
            'medianbb_min1l' => [
                'type' => 'FLOAT'
            ],
            'medianbb_plus1p' => [
                'type' => 'FLOAT'
            ],
            'medianbb_min1p' => [
                'type' => 'FLOAT'
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
