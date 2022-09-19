<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => "admin@admin.com",
            'username' => 'admin',
            'password' => password_hash('admin1234', PASSWORD_BCRYPT),
            'status' => 'active',
            'role' => 'admin'
        ];

        $table = $this->db->table('users');
        $table->insert($data);
    }
}
