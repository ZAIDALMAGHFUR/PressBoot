<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected function redirectTo(){
        if(auth()->user()->roles_id == 1){
            return RouteServiceProvider::HOME;
        }elseif(auth()->user()->roles_id == 2){
            if (auth()->user()->active == 0) {
                Auth::logout();
                Session::flush();
                Session::regenerate();
                toastr()->error('Akun anda belum aktif, silahkan hubungi admin untuk mengaktifkan akun anda.');
                return route('login');
            }
            return RouteServiceProvider::AGENSI;
        }elseif(auth()->user()->roles_id == 3){
            if (auth()->user()->active == 0) {
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
