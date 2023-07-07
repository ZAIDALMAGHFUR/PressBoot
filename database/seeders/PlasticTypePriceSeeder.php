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
            'price' => 1000,
        ]);
    }
}
