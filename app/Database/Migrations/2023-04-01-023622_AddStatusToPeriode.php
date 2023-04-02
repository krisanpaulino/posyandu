<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToPeriode extends Migration
{
    public function up()
    {
        $this->forge->addColumn('periode', [
            'periode_status' => [
                'type' => 'ENUM',
                'constraint' => ['tutup', 'buka', 'selesai']
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
