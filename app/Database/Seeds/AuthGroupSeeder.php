<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupSeeder extends Seeder
{
    public function run()
    {
        return $this->db->table('auth_groups')->insertBatch([
            [
                'name'          => 'admin',
                'description'   => 'Administrator'
            ],
            [
                'name'          => 'user',
                'description'   => 'user'
            ]
        ]);
    }
}
