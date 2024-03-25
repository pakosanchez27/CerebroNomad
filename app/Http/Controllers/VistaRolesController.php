<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VistaRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(Request $request){
        $path = $request->path();
        return view('vistas.roles' , ['path' => $path]);
    }

    function store(Request $request){
  
        $password = bcrypt('Nomad2024');

       

       User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => $password,
            'rol' => $request->rol
        ]);

        return redirect()->back()->with('message', 'Usuario creado correctamente la contraseña temporal es:  Nomad2024');

    }
}
