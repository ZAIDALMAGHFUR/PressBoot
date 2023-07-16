<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AgentSeeder;
use Database\Seeders\IncomeSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\PengepulSeeder;
use Database\Seeders\PlasticTypeSeeder;
use Database\Seeders\IncomesAgentSeeder;
use Database\Seeders\IncomesPengepulSeeder;
use Database\Seeders\PlasticTypePriceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            LocationSeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PlasticTypeSeeder::class,
            PlasticTypePriceSeeder::class,
            IncomeSeeder::class,
            PengepulSeeder::class,
            AgentSeeder::class,
            IncomesAgentSeeder::class,
            IncomesPengepulSeeder::class,
        ]);
    }
}
