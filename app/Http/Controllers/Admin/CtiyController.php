<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CtiyController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('dashboard.master.Data-City.index', compact('cities'));
    }
}
