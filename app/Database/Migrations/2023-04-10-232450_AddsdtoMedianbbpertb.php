<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddsdtoMedianbbpertb extends Migration
{
    public function up()
    {
        $this->forge->addColumn('medianbbpertb', [
            'medianbbpertb_plus1l' => [
                'type' => 'FLOAT'
            ],
            'medianbbpertb_min1l' => [
                'type' => 'FLOAT'
            ],
            'medianbbpertb_plus1p' => [
                'type' => 'FLOAT'
            ],
            'medianbbpertb_min1p' => [
                'type' => 'FLOAT'
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
