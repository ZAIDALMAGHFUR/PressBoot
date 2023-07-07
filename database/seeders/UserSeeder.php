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
            'roles_id' => 1,
        ]);
        User::create([
            'first_name' => 'agent',
            'last_name' => 'zaid',
            'email' => 'agent@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'roles_id' => 2,
        ]);
    }
}
