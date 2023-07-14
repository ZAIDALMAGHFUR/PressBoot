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
            'acc_status' => 'waiting',
        ]);

        return redirect()->route('agent.trash-in')->with([
            'success' => 'Data berhasil ditambahkan',
            'alert-type' => 'success'
        ]);
    }


    public function accStatus(Income $income)
    {
        $income->update([
            'acc_status' => 'approved',
        ]);

        return redirect()->back()->with([
            'success' => 'Data berhasil diubah',
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

        $PlasticTypePrice = PlasticTypePrice::find($request->plastic_types_id);
        // dd($PlasticTypePrice->price * $request->weight);

        $totalPrice = $PlasticTypePrice->price * $request->weight;

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
            'price' => $totalPrice,
            'acc_status' => $request->acc_status,
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
