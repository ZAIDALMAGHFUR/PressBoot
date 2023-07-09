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
        //mengambil data user dan tidak mau mengambil dat admin
        $users = User::where('roles_id', '!=', '1')->get();
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
