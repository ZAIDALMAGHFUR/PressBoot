<?php

namespace App\Http\Controllers\Pengepul;

use App\Models\Income;
use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use App\Http\Controllers\Controller;

class PengepulTrashInController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $incomes = Income::where('users_id', $user->id)->get();
        foreach ($incomes as $income) {
            $income->price = number_format($income->price, 0, ',', '.');
        }
        return view('pengepul.data.TrashIn.index', compact('incomes'));
    }

    public function create()
    {
        $PlasticTypePrice = PlasticTypePrice::all();
        $plasticTypes = PlasticType::all();
        return view('pengepul.data.TrashIn.add', compact('PlasticTypePrice', 'plasticTypes'));
    }

    public function getPrice(Request $request)
    {
        $plasticTypePrice = PlasticTypePrice::find($request->plastic_types_id);
        if ($plasticTypePrice) {
            $totalPrice = $plasticTypePrice->price * $request->weight;
            return response()->json($totalPrice);
        }
        return response()->json(0);
    }

    public function store(Request $request)
    {
        $user = Auth()->user();

        $request->validate([
            'plastic_types_id' => 'required',
            'status' => 'required',
            'weight' => 'required',
        ]);

        $PlasticTypePrice = PlasticTypePrice::find($request->plastic_types_id);
        // dd($PlasticTypePrice->price * $request->weight);

        $totalPrice = $PlasticTypePrice->price * $request->weight;

        $income = Income::create([
            'users_id' => $user->id,
            'plastic_types_id' => $request->plastic_types_id,
            'status' => $request->status,
            'weight' => $request->weight,
            'price' => $totalPrice,
        ]);

        return redirect()->route('pengepul.trash-in')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $income = Income::find($id);
        $plasticTypes = PlasticType::all();
        return view('pengepul.data.TrashIn.edit', compact('income', 'plasticTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plastic_types_id' => 'required',
            'status' => 'required',
            'weight' => 'required',
        ]);

        $income = Income::find($id);
        $income->plastic_types_id = $request->plastic_types_id;
        $income->status = $request->status;
        $income->weight = $request->weight;
        $income->save();

        return redirect()->route('pengepul.trash-in')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $income = Income::find($id);
        $income->delete();

        return redirect()->route('pengepul.trash-in')->with('success', 'Data berhasil dihapus');
    }
}
