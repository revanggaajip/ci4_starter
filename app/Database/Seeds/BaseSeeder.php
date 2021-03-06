<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AuthGroupSeeder');
        $this->call('UserSeeder');
        $this->call('AuthGroupUserSeeder');
    }
}
