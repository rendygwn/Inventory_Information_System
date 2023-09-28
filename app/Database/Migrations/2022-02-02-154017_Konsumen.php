<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Konsumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_konsumen'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kd_konsumen'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_telepon'       => [
                'type'       => 'VARCHAR',
                'constraint' => '12',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_konsumen', true);
        $this->forge->createTable('konsumen');
    }

    public function down()
    {
        $this->forge->dropTable('konsumen');
    }
}
