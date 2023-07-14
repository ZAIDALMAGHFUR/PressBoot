<?php

namespace App\Http\Controllers\Agensi;

use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use App\Http\Controllers\Controller;

class PlasticTypePriceController extends Controller
{
    public function index()
    {
        $plasticTypePrices = PlasticTypePrice::all();
        return view('agensi.data.TrashTypePrice.index', compact('plasticTypePrices'));
    }
}
