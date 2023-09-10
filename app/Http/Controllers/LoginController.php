<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function authenticate(Request $request) {
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        
        } else if (Auth::guard('pelanggan')->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success','Berhasil login!');
        }

        return redirect('/')->with('loginError','Login Gagal');

    }

    public function logout(Request $request){
        if(Auth::logout());

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
