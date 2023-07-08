<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'city' => 'Jakarta',
            'location_id' => 1,
        ]);
        City::create([
            'city' => 'Bandung',
            'location_id' => 1,
        ]);
        City::create([
            'city' => 'Surabaya',
            'location_id' => 1,
        ]);
        City::create([
            'city' => 'Semarang',
            'location_id' => 3,
        ]);
        City::create([
            'city' => 'Yogyakarta',
            'location_id' => 2,
        ]);
        City::create([
            'city' => 'Malang',
            'location_id' => 1,
        ]);
        City::create([
            'city' => 'Bali',
            'location_id' => 1,
        ]);
        City::create([
            'city' => 'Medan',
            'location_id' => 2,
        ]);
        City::create([
            'city' => 'Palembang',
            'location_id' => 3,
        ]);
        City::create([
            'city' => 'Makassar',
            'location_id' => 2,
        ]);
    }
}
