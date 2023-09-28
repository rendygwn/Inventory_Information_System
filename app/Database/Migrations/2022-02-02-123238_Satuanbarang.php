<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Satuanbarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_satuan_brg'          => [
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
            'jenis_brg'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'satuan_brg'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stok'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('id_satuan_brg', true);
        $this->forge->createTable('satuanbarang');
    }

    public function down()
    {
        $this->forge->dropTable('id_satuan_brg');
    }
}
