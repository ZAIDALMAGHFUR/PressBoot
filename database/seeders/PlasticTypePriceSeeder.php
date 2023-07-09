<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlasticTypePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlasticTypePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlasticTypePrice::create([
            'plastic_type_id' => 1,
            'location_id' => 1,
            'price' => 100000,
        ]);
        PlasticTypePrice::create([
            'plastic_type_id' => 2,
            'location_id' => 2,
            'price' => 200000,
        ]);
        PlasticTypePrice::create([
            'plastic_type_id' => 3,
            'location_id' => 3,
            'price' => 300000,
        ]);
        PlasticTypePrice::create([
            'plastic_type_id' => 4,
            'location_id' => 4,
            'price' => 400000,
        ]);
    }
}
