<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AgensiController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PengepulController;
use App\Http\Controllers\Agensi\TrashInController;
use App\Http\Controllers\Agensi\DashboardController;
use App\Http\Controllers\Agensi\PlasticTypeController;
use App\Http\Controllers\Pengepul\DashboardPController;
use App\Http\Controllers\Admin\TypesOfPlasticController;
use App\Http\Controllers\Agensi\PlasticTypePriceController;
use App\Http\Controllers\Pengepul\PengepulTrashInController;
use App\Http\Controllers\Pengepul\PengepulPlasticTypeController;
use App\Http\Controllers\Admin\PricesForTypesOfPlasticController;
use App\Http\Controllers\Pengepul\PengepulPlasticTypePriceController;


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

    //get city
    Route::get('/city', [CityController::class, 'index'])->name('city');
    Route::get('/city/create', [CityController::class, 'create'])->name('city.create');
    Route::post('/city/store', [CityController::class, 'store'])->name('city.store');
    Route::get('/city/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
    Route::post('/city/update/{id}', [CityController::class, 'update'])->name('city.update');
    Route::delete('/city/delete/{id}', [CityController::class, 'destroy'])->name('city.delete');

    //get plastic type
    Route::get('/plastic-type', [TypesOfPlasticController::class, 'index'])->name('plastic-type');
    Route::get('/plastic-type/create', [TypesOfPlasticController::class, 'create'])->name('plastic-type.create');
    Route::post('/plastic-type/store', [TypesOfPlasticController::class, 'store'])->name('plastic-type.store');
    Route::get('/plastic-type/edit/{id}', [TypesOfPlasticController::class, 'edit'])->name('plastic-type.edit');
    Route::post('/plastic-type/update/{id}', [TypesOfPlasticController::class, 'update'])->name('plastic-type.update');
    Route::delete('/plastic-type/delete/{id}', [TypesOfPlasticController::class, 'destroy'])->name('plastic-type.delete');

    //get plastic type price
    Route::get('/plastic-type-price', [PricesForTypesOfPlasticController::class, 'index'])->name('plastic-type-price');
    Route::get('/plastic-type-price/create', [PricesForTypesOfPlasticController::class, 'create'])->name('plastic-type-price.create');
    Route::post('/plastic-type-price/store', [PricesForTypesOfPlasticController::class, 'store'])->name('plastic-type-price.store');
    Route::get('/plastic-type-price/edit/{id}', [PricesForTypesOfPlasticController::class, 'edit'])->name('plastic-type-price.edit');
    Route::post('/plastic-type-price/update/{id}', [PricesForTypesOfPlasticController::class, 'update'])->name('plastic-type-price.update');
    Route::delete('/plastic-type-price/delete/{id}', [PricesForTypesOfPlasticController::class, 'destroy'])->name('plastic-type-price.delete');


    //get agensi
    Route::get('/agensi', [AgensiController::class, 'index'])->name('agensi');
    Route::delete('/agensi/delete/{id}', [AgensiController::class, 'destroy'])->name('agensi.delete');
    Route::put('/activate-agent/{user}', [AgensiController::class, 'activateUser'])->name('agensi.activateUser');

    //get pengepul
    Route::get('/pengepul', [PengepulController::class, 'index'])->name('pengepul');
    Route::delete('/pengepul/delete/{id}', [PengepulController::class, 'destroy'])->name('pengepul.delete');
    Route::put('/activate-pengepul/{user}', [PengepulController::class, 'activateUser'])->name('pengepul.activateUser');


    //get trash in
    Route::get('/trash-in', [IncomeController::class, 'index'])->name('trash-in');

    Route::get('/job-search',  [JobController::class, 'index'])->name('job-search');

    Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom');
    Route::get('/zoom/create', [ZoomController::class, 'create'])->name('zoom/create');
    Route::post('/zoom/save', [ZoomController::class, 'save'])->name('zoom/save');
});


Route::group(['middleware' => ['auth', 'OnlyAgent']], function () {
    Route::get('/agent', [DashboardController::class, 'index'])->name('agent');

    //get trash in
    Route::get('/agent/trash-in', [TrashInController::class, 'index'])->name('agent.trash-in');
    Route::get('/agent/trash-in/create', [TrashInController::class, 'create'])->name('agent.trash-in.create');
    Route::post('/agent/trash-in/store', [TrashInController::class, 'store'])->name('agent.trash-in.store');
    Route::get('/agent/trash-in/edit/{id}', [TrashInController::class, 'edit'])->name('agent.trash-in.edit');
    Route::post('/agent/trash-in/update/{id}', [TrashInController::class, 'update'])->name('agent.trash-in.update');
    Route::delete('/agent/trash-in/delete/{id}', [TrashInController::class, 'destroy'])->name('agent.trash-in.delete');
    Route::post('/agent/trash-in/confirm/{income}', [TrashInController::class, 'accStatus'])->name('agent.trash-in.confirm');

    //get price
    Route::get('/agent/getPrice', [TrashInController::class, 'getPrice'])->name('agent.getPrice');

    //get Trash Type
    Route::get('/agent/trash-type', [PlasticTypeController::class, 'index'])->name('agent.trash-type');

    //get Trash Type Price
    Route::get('/agent/trash-type-price', [PlasticTypePriceController::class, 'index'])->name('agent.trash-type-price');
});



Route::group(['middleware' => ['auth', 'OnlyPengepul']], function () {
    Route::get('/pengepul', [DashboardPController::class, 'index'])->name('pengepul');

    //get plastic type
    Route::get('/pengepul/trash-type', [PengepulPlasticTypeController::class, 'index'])->name('pengepul.trash-type');

    //get plastic type price
    Route::get('/pengepul/trash-type-price', [PengepulPlasticTypePriceController::class, 'index'])->name('pengepul.trash-type-price');

    //get trash in
    Route::get('/pengepul/trash-in', [PengepulTrashInController::class, 'index'])->name('pengepul.trash-in');
    Route::get('/pengepul/trash-in/create', [PengepulTrashInController::class, 'create'])->name('pengepul.trash-in.create');
    Route::post('/pengepul/trash-in/store', [PengepulTrashInController::class, 'store'])->name('pengepul.trash-in.store');
    Route::get('/pengepul/trash-in/edit/{id}', [PengepulTrashInController::class, 'edit'])->name('pengepul.trash-in.edit');
    Route::post('/pengepul/trash-in/update/{id}', [PengepulTrashInController::class, 'update'])->name('pengepul.trash-in.update');
    Route::delete('/pengepul/trash-in/delete/{id}', [PengepulTrashInController::class, 'destroy'])->name('pengepul.trash-in.delete');

    //get price
    Route::get('/pengepul/getPrice', [PengepulTrashInController::class, 'getPrice'])->name('pengepul.getPrice');
});



