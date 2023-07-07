<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name_location' => 'Jabar',
        ]);
        Location::create([
            'name_location' => 'Jatim',
        ]);
        Location::create([
            'name_location' => 'Jateng',
        ]);
        Location::create([
            'name_location' => 'Jogja',
        ]);
        Location::create([
            'name_location' => 'Bali',
        ]);
        Location::create([
            'name_location' => 'NTB',
        ]);
    }
}
