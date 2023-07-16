<?php

namespace Database\Seeders;

use App\Models\IncomesAgent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncomesAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomesAgent::create([
            'agents_id' => 1,
            'no_telp' => '081234567890',
            'tanggal' => '2021-01-01',
            'plastic_types_id' => 1,
            'status' => 'income',
            'weight' => 1000,
            'price' => 1000,
            'foto' => 'agent1.jpg',
        ]);
    }
}
