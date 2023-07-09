<?php

namespace App\Http\Controllers\Agensi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('agensi.dashboard.dashboard');
    }
}
