<?php

namespace App\Http\Controllers\Pengepul;

use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use App\Http\Controllers\Controller;

class PengepulPlasticTypePriceController extends Controller
{
    public function index()
    {
        $plasticTypePrices = PlasticTypePrice::all();

        foreach ($plasticTypePrices as $plasticTypePrice) {
            $plasticTypePrice->price = number_format($plasticTypePrice->price, 0, ',', '.');
        }
        return view('pengepul.data.TrashTypePrice.index', compact('plasticTypePrices'));
    }
}
