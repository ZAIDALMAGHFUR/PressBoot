<?php

namespace App\Http\Controllers\Admin;

use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesOfPlasticController extends Controller
{
    public function index()
    {
        $PlasticType = PlasticType::all();
        return view('dashboard.master.data.trash-types.index', compact('PlasticType'));
    }

    public function create()
    {
        return view('dashboard.master.data.trash-types.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plastic_type' => 'required',
        ]);

        PlasticType::create([
            'plastic_type' => $request->plastic_type,
        ]);

        return redirect()->route('plastic-type')->with([
            'success' => 'Data Jenis Sampah Berhasil Ditambahkan',
            'type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $PlasticType = PlasticType::find($id);
        return view('dashboard.master.data.trash-types.edit', compact('PlasticType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plastic_type' => 'required',
        ]);

        $PlasticType = PlasticType::find($id);
        $PlasticType->update([
            'plastic_type' => $request->plastic_type,
        ]);

        return redirect()->route('plastic-type')->with([
            'success' => 'Data Jenis Sampah Berhasil Diubah',
            'type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $PlasticType = PlasticType::find($id);
        $PlasticType->delete();

        return redirect()->route('plastic-type')->with([
            'success' => 'Data Jenis Sampah Berhasil Dihapus',
            'type' => 'success',
        ]);
    }
}
