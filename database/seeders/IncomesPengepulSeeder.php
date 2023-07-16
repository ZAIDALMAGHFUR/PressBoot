<?php

namespace Database\Seeders;

use App\Models\IncomesPengepul;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncomesPengepulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomesPengepul::create([
            'pengepuls_id' => 1,
            'no_telp' => '081234567890',
            'tanggal' => '2021-01-01',
            'plastic_types_id' => 1,
            'status' => 'income',
            'weight' => 1000,
            'price' => 1000,
            'foto' => 'pengepul1.jpg',
        ]);
    }
}
