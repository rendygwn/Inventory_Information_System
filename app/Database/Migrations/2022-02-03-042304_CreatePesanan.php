<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pesan'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kd_pesan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'tgl_pesan'       => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'qty'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_konsumen'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'kd_konsumen'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_barang'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'kd_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama_brg'       => [
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
            ]
        ]);
        $this->forge->addKey('id_pesan', true);
        $this->forge->addForeignKey('id_pesan', 'konsumen', 'id_konsumen', 'barang', 'id_barang');
        $this->forge->createTable('pesan');
    }

    public function down()
    {
        $this->forge->dropForeignKey('pesan', 'pesan_id_kosumen_foreign', 'pesan_id_barang_foreign');
        $this->forge->dropTable('pesan');
    }
}
