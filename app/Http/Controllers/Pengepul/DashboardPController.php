<?php

namespace App\Http\Controllers\Pengepul;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class DashboardPController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $stats = Cache::remember('card-stats-' . auth()->id(), 10 * 1, fn () => $this->_getStats());
        return view('pengepul.dashboard.index', [
            'stats' => $stats
        ]);
    }


    private function _getStats()
    {
        $user = auth()->user();
        $today = date('Y-m-d');

        $totalIncome = Income::where('price', '>', 0)
            ->where('status', 'income')
            ->where('acc_status', 'approved')
            ->where('users_id', $user->id)
            ->whereDate('created_at', $today)
            ->sum('price');

        $formattedIncomeInDay = number_format($totalIncome, 0, ',', '.');


        $totalIncomeInMonth = Income::where('price', '>', 0)
            ->where('status', 'income')
            ->where('acc_status', 'approved')
            ->where('users_id', $user->id)
            ->whereMonth('created_at', date('m'))->sum('price');

        $formattedIncomeInMoonth = number_format($totalIncomeInMonth, 0, ',', '.');



    return [
            [
                "label" => "Total Income Hari Ini",
                "value" => $formattedIncomeInDay,
                'icon' => 'info'
            ],
            [
                "label" => "Total Income Bulan Ini",
                "value" => $formattedIncomeInMoonth,
                'icon' => 'info'
            ],
        ];
    }

}
