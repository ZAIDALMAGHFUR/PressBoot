<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Income;
use App\Models\Role;
use App\Models\User;
use App\Models\Location;
use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = Cache::remember('card-stats-' . auth()->id(), 10 * 1, fn () => $this->_getStats());

        return view('dashboard.home', [
            'stats' => $stats
        ]);
    }

    private function _getStats()
    {
        $totalIncome = Income::where('price', '>', 0)->whereMonth('created_at', date('m'))->sum('price');
        $formattedIncome = number_format($totalIncome, 0, ',', '.');

        return [
            [
                "label" => "Total Pengguna",
                "value" => User::count(),
                'icon' => 'sun'
            ],
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
                "label" => "Total Role",
                "value" => Role::count(),
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
