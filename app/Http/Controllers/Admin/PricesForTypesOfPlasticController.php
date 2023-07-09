<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use App\Http\Controllers\Controller;

class PricesForTypesOfPlasticController extends Controller
{
    public function index()
    {
        $plasticTypePrices = PlasticTypePrice::all();

        foreach ($plasticTypePrices as $plasticTypePrice) {
            $plasticTypePrice->price = number_format($plasticTypePrice->price, 0, ',', '.');
        }

        return view('dashboard.master.data.trash-types-price.index', compact('plasticTypePrices'));
    }

    public function create()
    {
        $locations = Location::all();
        $plasticTypes = PlasticType::all();
        return view('dashboard.master.data.trash-types-price.add', compact('locations', 'plasticTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plastic_type_id' => 'required',
            'location_id' => 'required',
            'price' => 'required',
        ]);

        PlasticTypePrice::create([
            'plastic_type_id' => $request->plastic_type_id,
            'location_id' => $request->location_id,
            'price' => $request->price,
        ]);

        return redirect()->route('plastic-type-price')->with([
            'success' => 'Data Harga Jenis Sampah Berhasil Ditambahkan',
            'type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $plasticTypePrice = PlasticTypePrice::find($id);
        $locations = Location::all();
        $plasticTypes = PlasticType::all();
        return view('dashboard.master.data.trash-types-price.edit', compact('plasticTypePrice', 'locations', 'plasticTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plastic_type_id' => 'required',
            'location_id' => 'required',
            'price' => 'required',
        ]);

        $plasticTypePrice = PlasticTypePrice::find($id);
        $plasticTypePrice->update([
            'plastic_type_id' => $request->plastic_type_id,
            'location_id' => $request->location_id,
            'price' => $request->price,
        ]);

        return redirect()->route('plastic-type-price')->with([
            'success' => 'Data Harga Jenis Sampah Berhasil Diubah',
            'type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $plasticTypePrice = PlasticTypePrice::find($id);
        $plasticTypePrice->delete();

        return redirect()->route('plastic-type-price')->with([
            'success' => 'Data Harga Jenis Sampah Berhasil Dihapus',
            'type' => 'success',
        ]);
    }
}
