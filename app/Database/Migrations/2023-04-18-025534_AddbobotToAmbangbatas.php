<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddbobotToAmbangbatas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('ambangbatas', [
            'ambangbatas_bobotkriteria' => [
                'type' => 'FLOAT'
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
