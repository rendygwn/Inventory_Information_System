<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_user' => 'Admin',
                'email' => 'haiadmin@gmail.com',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),

            ],
            [
                'nama_user' => 'Rendi Gunawan',
                'email' => 'dev.helloword@gmail.com',
                'password' => password_hash('dev12345', PASSWORD_BCRYPT),
            ],
            [
                'nama_user' => 'Supervisor',
                'email' => 'robonesia@gmail.com',
                'password' => password_hash('super12345', PASSWORD_BCRYPT),
            ]
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
