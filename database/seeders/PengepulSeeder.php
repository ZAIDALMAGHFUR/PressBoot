<?php

namespace Database\Seeders;

use App\Models\Pengepul;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengepulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengepul::create([
            'users_id' => 3,
            'kode_pengepul' => 'PNG001',
            'no_telp' => '081234567890',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Jl. Pengepul 1',
            'jenis_kelamin' => 'Laki - Laki',
            'foto' => 'pengepul1.jpg',
            'agama' => 'Islam',
        ]);
    }
}
