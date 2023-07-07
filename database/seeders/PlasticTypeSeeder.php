<?php

namespace Database\Seeders;

use App\Models\PlasticType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlasticTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlasticType::create([
            'plastic_type' => 'PET',
        ]);
        PlasticType::create([
            'plastic_type' => 'HDPE',
        ]);
        PlasticType::create([
            'plastic_type' => 'PVC',
        ]);
        PlasticType::create([
            'plastic_type' => 'LDPE',
        ]);
        PlasticType::create([
            'plastic_type' => 'PP',
        ]);
        PlasticType::create([
            'plastic_type' => 'PS',
        ]);
    }
}
