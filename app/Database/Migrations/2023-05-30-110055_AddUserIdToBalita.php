<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToBalita extends Migration
{
    public function up()
    {
        $this->forge->addColumn('balita', [
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true
            ],
            // 'CONSTRAINT fk_balita_user_id FOREIGN KEY (user_id) REFERENCES user(user_id) ON UPDATE CASCADE ON DELETE CASCADE'
        ]);
    }

    public function down()
    {
        //
    }
}
