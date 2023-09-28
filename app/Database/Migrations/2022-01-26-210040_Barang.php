<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kd_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'gambar'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'nama_brg'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_paket_brg'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stok'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
