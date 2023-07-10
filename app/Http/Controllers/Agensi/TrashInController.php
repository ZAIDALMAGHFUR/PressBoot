<?php

namespace App\Http\Controllers\Agensi;

use App\Models\Income;
use App\Models\PlasticType;
use Illuminate\Http\Request;
use App\Models\PlasticTypePrice;
use App\Http\Controllers\Controller;

class TrashInController extends Controller
{
    public function index()
    {
        $incomes = Income::all();

        foreach ($incomes as $income) {
            $income->price = number_format($income->price, 0, ',', '.');
        }
        return view('agensi.data.AgentTrashIn.index', compact('incomes'));
    }

    public function create()
    {
        $PlasticTypePrice = PlasticTypePrice::all();
        $plasticTypes = PlasticType::all();
        return view('agensi.data.AgentTrashIn.add', compact('PlasticTypePrice', 'plasticTypes'));
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

        return redirect()->route('agent.trash-in')->with([
            'success' => 'Data berhasil ditambahkan',
            'alert-type' => 'success'
        ]);
    }


    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $plasticTypes = PlasticType::all();
        return view('agensi.data.AgentTrashIn.edit', compact('income', 'plasticTypes'));
    }

    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);

        $request->validate([
            'plastic_types_id' => 'required',
            'status' => 'required',
            'weight' => 'required',
        ]);

        $income->update([
            'plastic_types_id' => $request->plastic_types_id,
            'status' => $request->status,
            'weight' => $request->weight,
            'price' => $request->price,
        ]);

        return redirect()->route('agent.trash-in')->with([
            'success' => 'Data berhasil diubah',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        return redirect()->back()->with([
            'success' => 'Data berhasil dihapus',
            'alert-type' => 'success'
        ]);
    }
}