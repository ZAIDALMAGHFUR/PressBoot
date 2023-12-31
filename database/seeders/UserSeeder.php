<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'zaid',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'locations_id' => 1, // 'locations_id' => 1,
            'citys_id' => 1, // 'citys_id' => 1,
            'active' => 1, // 'active' => 1,
            'roles_id' => 1,
        ]);
        User::create([
            'first_name' => 'agent',
            'last_name' => 'zaid',
            'email' => 'agent@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'locations_id' => 1, // 'locations_id' => 1,
            'citys_id' => 2, // 'citys_id' => 1,
            'active' => 1, // 'active' => 1,
            'roles_id' => 2,
        ]);
        User::create([
            'first_name' => 'pengepul',
            'last_name' => 'zaid',
            'email' => 'pengepul@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'locations_id' => 1, // 'locations_id' => 1,
            'citys_id' => 3, // 'citys_id' => 1,
            'active' => 1, // 'active' => 1,
            'roles_id' => 3,
        ]);
    }
}
