<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('dashboard.master.data.city.index', compact('cities'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('dashboard.master.data.city.add', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'location_id' => 'required',
        ]);

        City::create([
            'city' => $request->city,
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('city')->with([
            'success' => 'City created successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $city = City::find($id);
        $locations = Location::all();
        return view('dashboard.master.data.city.edit', compact('city', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required',
            'location_id' => 'required',
        ]);

        $city = City::find($id);
        $city->update([
            'city' => $request->city,
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('city')->with([
            'success' => 'City updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();

        return redirect()->route('city')->with([
            'success' => 'City deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
