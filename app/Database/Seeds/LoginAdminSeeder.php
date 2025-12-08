<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoginAdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'          => 'Super Admin',
                'email'         => 'admin@visaease.com',
                // Password: admin123
                'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                'created_at'    => date('Y-m-d H:i:s'),
            ],
             [
                'name'          => 'Taufik',
                'email'         => 'admon@gmail.com',
                // Password: admin123
                'password_hash' => password_hash('admin111', PASSWORD_DEFAULT),
                'created_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        // Insert ke tabel admins
        $this->db->table('admins')->insertBatch($data);
    }
}