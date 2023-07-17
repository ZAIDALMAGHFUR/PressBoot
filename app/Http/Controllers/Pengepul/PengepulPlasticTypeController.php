<?php

namespace App\Http\Controllers\Pengepul;

use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengepulPlasticTypeController extends Controller
{
    public function index()
    {
        $PlasticType = PlasticType::all();
        return view('pengepul.data.TrashType.index', compact('PlasticType'));
    }
}
