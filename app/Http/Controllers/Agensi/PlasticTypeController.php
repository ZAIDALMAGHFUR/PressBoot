<?php

namespace App\Http\Controllers\Agensi;

use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlasticTypeController extends Controller
{
    public function index()
    {
        $PlasticType = PlasticType::all();
        return view('agensi.data.TrashType.index', compact('PlasticType'));
    }
}
