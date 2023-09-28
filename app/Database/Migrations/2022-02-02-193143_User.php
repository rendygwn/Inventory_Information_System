<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'BIGINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_user'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'       => true,
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'info'       => [
                'type'       => 'TEXT',
                'null' => 'true',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'current_timestamp' => true,
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
