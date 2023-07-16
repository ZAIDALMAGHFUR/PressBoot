<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::create([
            'users_id' => 2,
            'kode_agent' => 'AGT001',
            'no_telp' => '081234567890',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Jl. Agent 1',
            'jenis_kelamin' => 'Laki - Laki',
            'foto' => 'agent1.jpg',
            'agama' => 'Islam',
        ]);
    }
}
