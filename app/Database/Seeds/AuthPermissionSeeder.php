<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermissionSeeder extends Seeder
{
    public function run()
    {
        return $this->db->table('auth_permissions')->insertBatch([
            [
                'name'          => 'manage-users',
                'description'   => 'Manage all users data'
            ],
            [
                'name'          => 'manage-profile',
                'description'   => "Manage user profile"
            ]
        ]);
    }
}
