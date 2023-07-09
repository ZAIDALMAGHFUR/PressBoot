<?php

namespace App\Http\Controllers\Admin;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function index()
    {
        $income = Income::all();

        foreach ($income as $incomes) {
            $incomes->price = number_format($incomes->price, 0, ',', '.');
        }
        return view('dashboard.master.data.trash-in.index', compact('income'));
    }
}
