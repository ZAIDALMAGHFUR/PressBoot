<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo(){
        if(auth()->user()->roles_id == 1){
            return RouteServiceProvider::HOME;
        }elseif(auth()->user()->roles_id == 2){
            if (auth()->user()->status == 0) {
                Auth::logout();
                Session::flush();
                Session::regenerate();
                toastr()->error('Akun anda belum aktif, silahkan hubungi admin untuk mengaktifkan akun anda.');
                return route('login');
            }
            return RouteServiceProvider::AGENSI;
        }elseif(auth()->user()->roles_id == 3){
            if (auth()->user()->status == 0) {
                Auth::logout();
                Session::flush();
                Session::regenerate();
                toastr()->error('Akun anda belum aktif, silahkan hubungi admin untuk mengaktifkan akun anda.');
                return route('login');
            }
            return RouteServiceProvider::PENGEPUL;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
