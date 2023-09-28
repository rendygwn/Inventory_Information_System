<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawansupply extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->addKey('id_karyawan', true);
        $this->forge->createTable('karyawansupply');
    }

    public function down()
    {
        $this->forge->dropTable('karyawansupply');
    }
}
