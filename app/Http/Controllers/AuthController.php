<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('loading');
        }
        return view('auth.login');
    }

    public function loading()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function home()
    {
        return redirect()->route('home');
    }
}