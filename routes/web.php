<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\Agensi\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'OnlyAdmin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('/job-search',  [JobController::class, 'index'])->name('job-search');

    Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom');
    Route::get('/zoom/create', [ZoomController::class, 'create'])->name('zoom/create');
    Route::post('/zoom/save', [ZoomController::class, 'save'])->name('zoom/save');
});


Route::group(['middleware' => ['auth', 'OnlyAgent']], function () {
    Route::get('/agent', [DashboardController::class, 'index'])->name('agent');
});

