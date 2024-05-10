<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;    

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
         
            return redirect()->intended('/home')->with('success', 'Login success, welcome to the dashboard!');
        }
        return back()->with('error', 'Login failed, please check your NIP and password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
