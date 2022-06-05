<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        return $this->db->table('users')->insert([
            'name'          => 'administrator',
            'email'         => 'admin@gmail.com',
            'username'      => 'admin',
            'password_hash' => Password::hash('admin'),
            'active'        => 1
        ]);
    }
}
