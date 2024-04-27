<?php

namespace App\Http\Controllers;

use App\Mail\TokenLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        if (!auth()->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return back()->with('status', 'Credenciales incorrectas');
        }

        // Obtener al usuario autenticado
        $user = auth()->user();

        // Verificar si la contraseña del usuario es la predeterminada
        if (password_verify('Nomad2024', $user->password)) {

            // Redirigir al usuario a la vista para cambiar la contraseña
            return redirect()->route('cambiar-contraseña', ['user' => $user = auth()->user()]);
        }

        // Generar token de autenticación de 8 digitos alfanumerico
        $token = bin2hex(random_bytes(4));

        // Guardar el tiken en la base de datos
       User::where('email', $request->email)->update(['tokenLogin' => $token]);

    //    Enviar token por el email
       Mail::to($request->email)->send(new TokenLogin($token));

        return back()->with('token', 'Ingresa el token enviado a tu correo');
    }
    public function verificarToken(Request $request)
    {
        $this->validate($request, [
            'tokenLogin' => 'required'
        ]);

        // Buscar al usuario por el token
        $user = User::where('tokenLogin', $request->tokenLogin)->first();

        if (!$user) {
            return back()->with('errorToken', 'Token incorrecto');
        }

        // Verificar si el token proporcionado es igual al almacenado en la base de datos
        if ($user->tokenLogin !== $request->tokenLogin) {
            return back()->with('errorToken', 'Token incorrecto');
        }

        // Si el token es correcto, no lo eliminamos de la base de datos,
        // sino que simplemente redirigimos al usuario a la página de inicio.
        return redirect()->route('home');
    }




}
