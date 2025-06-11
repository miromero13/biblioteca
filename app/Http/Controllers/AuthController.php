<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Para usar la sesión

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLogin()
    {
        // Si el usuario ya está autenticado, redirigirlo a la vista de carga
        if (Auth::check()) {
            return redirect()->route('loading');
        }
        return view('auth.login');
    }

    // Mostrar vista de carga para autologin
    public function loading()
    {
        // En una aplicación real, aquí podrías tener lógica para verificar el token
        // y redirigir al home o al login si no es válido/no existe
        if (Auth::check()) {
            return redirect()->route('home');
        }
        // Si por alguna razón llega aquí sin estar autenticado (ej. acceso directo), redirigir a login
        return redirect()->route('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) { // Agregado remember me
            $request->session()->regenerate();
            // Guardar token de autenticación en la sesión (o en localStorage si usas SPA/API)
            // Para una aplicación con Blade, Laravel se encarga de la sesión.
            // Si necesitaras un token para API, lo generarías aquí.
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas',
        ])->onlyInput('email'); // Mantener el email en el campo
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Mostrar home (protegido)
    public function home()
    {
        // Esto será manejado por el BookController@index ahora
        return redirect()->route('home');
    }
}