<?php

namespace App\Http\Controllers;

use App\Mail\AltaColaboradorMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AltaColaboradorMailController;
use RealRashid\SweetAlert\Facades\Alert;

class VistaRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(Request $request)
    {
        $path = $request->path();
        $rol = $request->user()->role->name;

        $users = User::all();


        return view('vistas.roles', ['path' => $path, 'users' => $users, 'rol' => $rol]);
    }

    function store(Request $request)
    {

        // buscar que el correo no exista
        $correo = User::where('email', $request->email)->first();
        if ($correo) {
            return back()->with('email', 'El correo ya existe');
        }


        $password = bcrypt('Nomad2024');

        User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => $password,
            'role_id' => $request->rol
        ]);

        // enviar correo de alta de usuario
        Mail::to($request->email)->send(new AltaColaboradorMailable());


        return redirect()->route('roles')->with('susses', 'Usuario creado correctamente, su contraseña temporal es : Nomad2024');
    }

    function edit(Request $request, $id)
    {
        $path = $request->path();
        $user = User::find($id);
        return view('vistas.editar-colaborador', ['path' => $path, 'user' => $user]);
    }

    function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => '',
            'email' => 'required|email',
            'rol' => 'required'
        ]);

        // Buscar el usuario por su ID
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->name = $request->input('name');
        $user->apellido_paterno = $request->input('apellido_paterno');
        $user->apellido_materno = $request->input('apellido_materno');
        $user->email = $request->input('email');
        $user->rol = $request->input('rol');

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir a la página deseada después de la actualización
        return redirect()->route('roles')->with('editado', 'Usuario actualizado correctamente');
    }

    function destroy(Request $request, $id)
    {

        // Buscar el usuario por su ID
        $user = User::findOrFail($id);

        // Eliminar el usuario de la base de datos
        $user->delete();

        // Redirigir a la página deseada después de la eliminación
        return redirect()->route('roles')->with('eliminado', 'Usuario eliminado correctamente');
    }

    function resetPassword(Request $request, $id)
    {

        $password = bcrypt('Nomad2024');

        // Buscar el usuario por su ID
        $user = User::findOrFail($id);


        // Actualizar la contraseña del usuario
        $user->password = $password;

        // Guardar los cambios en la base de datos
        $user->save();



        // Redirigir a la página deseada después de la actualización
        return back()->with('success', 'Contraseña restablecida correctamente');
    }
}
