<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Agensi\DashboardController;
use App\Http\Controllers\Admin\TypesOfPlasticController;


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

    //get location
    Route::get('/location', [LocationController::class, 'index'])->name('location');
    Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
    Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('/location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/location/delete/{id}', [LocationController::class, 'destroy'])->name('location.delete');

    //get plastic type
    Route::get('/plastic-type', [TypesOfPlasticController::class, 'index'])->name('plastic-type');
    Route::get('/plastic-type/create', [TypesOfPlasticController::class, 'create'])->name('plastic-type.create');
    Route::post('/plastic-type/store', [TypesOfPlasticController::class, 'store'])->name('plastic-type.store');
    Route::get('/plastic-type/edit/{id}', [TypesOfPlasticController::class, 'edit'])->name('plastic-type.edit');
    Route::post('/plastic-type/update/{id}', [TypesOfPlasticController::class, 'update'])->name('plastic-type.update');
    Route::delete('/plastic-type/delete/{id}', [TypesOfPlasticController::class, 'destroy'])->name('plastic-type.delete');


    Route::get('/job-search',  [JobController::class, 'index'])->name('job-search');

    Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom');
    Route::get('/zoom/create', [ZoomController::class, 'create'])->name('zoom/create');
    Route::post('/zoom/save', [ZoomController::class, 'save'])->name('zoom/save');
});


Route::group(['middleware' => ['auth', 'OnlyAgent']], function () {
    Route::get('/agent', [DashboardController::class, 'index'])->name('agent');
});

