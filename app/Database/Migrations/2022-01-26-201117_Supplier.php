<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supplier extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_supplier'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kd_supplier'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_toko'       => [
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
        $this->forge->addKey('id_supplier', true);
        $this->forge->createTable('supplier');
    }

    public function down()
    {
        $this->forge->dropTable('supplier');
    }
}
