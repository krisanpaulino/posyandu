<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddsdtoMedianimt extends Migration
{
    public function up()
    {
        $this->forge->addColumn('mediantb', [
            'medianimt_plus1l' => [
                'type' => 'FLOAT'
            ],
            'medianimt_min1l' => [
                'type' => 'FLOAT'
            ],
            'medianimt_plus1p' => [
                'type' => 'FLOAT'
            ],
            'medianimt_min1p' => [
                'type' => 'FLOAT'
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
