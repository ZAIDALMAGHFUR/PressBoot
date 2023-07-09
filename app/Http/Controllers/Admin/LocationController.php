<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::all();
        return view('dashboard.master.data.location.index', compact('location'));
    }

    public function create()
    {
        return view('dashboard.master.data.location.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_location' => 'required',
        ]);

        Location::create([
            'name_location' => $request->name_location,
        ]);

        return redirect()->route('location')->with([
            'success' => 'Data Wilayah Berhasil Ditambahkan',
            'type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $location = Location::find($id);
        return view('dashboard.master.data.location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_location' => 'required',
        ]);

        $location = Location::find($id);
        $location->update([
            'name_location' => $request->name_location,
        ]);

        return redirect()->route('location')->with([
            'success' => 'Data Wilayah Berhasil Diubah',
            'type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return redirect()->route('location')->with([
            'success' => 'Data Wilayah Berhasil Dihapus',
            'type' => 'success',
        ]);
    }
}
