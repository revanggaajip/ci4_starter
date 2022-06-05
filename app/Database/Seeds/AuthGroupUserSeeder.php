<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupUserSeeder extends Seeder
{
    public function run()
    {
        return $this->db->table('auth_groups_users')->insert([
            'group_id'  => 1,
            'user_id'   => 1
        ]);
    }
}
