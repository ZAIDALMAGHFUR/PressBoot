<?php

namespace App\Http\Controllers\Agensi;

use App\Models\City;
use App\Models\Income;
use App\Models\Location;
use App\Models\PlasticType;
use MacsiDigital\Zoom\User;
use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $stats = Cache::remember('card-stats-' . auth()->id(), 10 * 1, fn () => $this->_getStats());

        return view('agensi.dashboard.dashboard',  [
            'stats' => $stats
        ]);
    }

    private function _getStats()
    {
        $totalIncome = Income::where('price', '>', 0)
        ->where('status', 'income')
        ->where('acc_status', 'approved')
        ->whereMonth('created_at', date('m'))->sum('price');
        $formattedIncome = number_format($totalIncome, 0, ',', '.');

        $totalexpEnditure = Income::where('price', '>', 0)
        ->where('status', 'expenditure')
        ->where('acc_status', 'approved')
        ->whereMonth('created_at', date('m'))->sum('price');
        $formattedEnditure = number_format($totalexpEnditure, 0, ',', '.');

        return [
            [
                "label" => "Total Location",
                "value" => Location::count(),
                'icon' => 'info'
            ],
            [
                "label" => "Total City",
                "value" => City::count(),
                'icon' => 'clipboard'
            ],
            [
                "label" => "Total Plastic Type",
                "value" => PlasticType::count(),
                'icon' => 'grid'
            ],
            [
                "label" => "Total Plastic Type Price",
                "value" => PlasticTypePrice::count(),
                'icon' => 'layout'
            ],
            [
                "label" => "Total expenditure this month",
                "value" => 'Rp ' . $formattedEnditure,
                'icon' => 'tag'
            ],
            [
                "label" => "Total Income this month",
                "value" => 'Rp ' . $formattedIncome,
                'icon' => 'tag'
            ],
        ];
    }
}
