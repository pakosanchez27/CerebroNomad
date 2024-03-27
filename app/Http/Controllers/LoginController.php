<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Credenciales incorrectas');
        }

        // Obtener al usuario autenticado
        $user = auth()->user();

        // Verificar si la contraseña del usuario es la predeterminada
        if (password_verify('Nomad2024', $user->password)) {
            
            // Redirigir al usuario a la vista para cambiar la contraseña
            return redirect()->route('cambiar-contraseña', ['user' => $user = auth()->user()]);
        }

        return redirect()->route('home');
    }
}
