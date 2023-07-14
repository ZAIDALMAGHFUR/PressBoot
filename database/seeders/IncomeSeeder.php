<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 1,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '200000',
            'acc_status' => 'approved'
        ]);
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 1,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '200000',
            'acc_status' => 'approved'
        ]);
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 1,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '2000000',
            'acc_status' => 'approved'
        ]);
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 1,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '2000000',
            'acc_status' => 'approved'
        ]);
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 4,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '2000000',
            'acc_status' => 'approved'
        ]);
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 3,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '2000000',
            'acc_status' => 'rejected'
        ]);
        Income::create([
            'users_id' => 2,
            'plastic_types_id' => 2,
            'status' => 'income',
            'weight' => '20 ',
            'price' => '2000000',
            'acc_status' => 'waiting'
        ]);
    }
}
