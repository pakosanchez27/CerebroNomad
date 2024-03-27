<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index(User $user)
    {
        return view('auth.change-password', compact('user'));
    }

    public function update(Request $request, $userId)
    {
        // Buscar al usuario por su ID
        $user = User::find($userId);
        
        // Verificar si se encontró al usuario
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
    
        // Validación de la contraseña
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);
        
        // Actualización de la contraseña
        $user->update([
            'password' => bcrypt($request->password)
        ]);
     
        // Mensaje de éxito y redirección
        return redirect()->route('home')->with('success', 'Contraseña actualizada correctamente');
    }
    
  
}
