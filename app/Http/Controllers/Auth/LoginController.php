<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request)
    {
        if(Auth::user()->role_as == '1') 
        {
            if ($request->from == 0) {
                Auth::logout();
                \Toastr::error('Esta no es la ruta para acceder al administrador');
                return redirect('/');
            } else {
                \Toastr::success('Has iniciado sesión como administrador');
                return redirect('/homeA');
            }
        }
        elseif(Auth::user()->role_as == '0')   
        {
            \Toastr::success('Has iniciado sesión');
            return redirect('/home');
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout(); 
        \Toastr::success('Has salido de tu cuenta');
        return redirect('/');
    }
}
