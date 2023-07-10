<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class AgensiController extends Controller
{

        public function __construct()
        {
            $this->middleware(['auth', 'verified']);
        }

    public function index()
    {
        // Mengambil data pengguna yang memiliki roles_id bukan 1 dan 3
        $users = User::whereNotIn('roles_id', [1, 3])->get();
        return view('dashboard.pengguna.agensi.index', compact('users'));
    }



    public function activateUser(Request $request, User $user)
    {
        $user->updateOrFail(['active'=>'1']);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with([
            'success' => 'Data berhasil dihapus',
            'alert-type' => 'success'
        ]);
    }
}
