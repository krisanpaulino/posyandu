<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddsdtoMediantb extends Migration
{
    public function up()
    {
        $this->forge->addColumn('mediantb', [
            'mediantb_plus1l' => [
                'type' => 'FLOAT'
            ],
            'mediantb_min1l' => [
                'type' => 'FLOAT'
            ],
            'mediantb_plus1p' => [
                'type' => 'FLOAT'
            ],
            'mediantb_min1p' => [
                'type' => 'FLOAT'
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
