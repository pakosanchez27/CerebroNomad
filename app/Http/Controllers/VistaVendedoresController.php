<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VistaVendedoresController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');    
    }
    
    function index(Request $request){
        $path = $request->path();
        $vendedores = Vendor::all();
        return view('vistas.vendedores' , ['path' => $path, 'vendedores' => $vendedores]);
    }

    function create(Request $request){
        $path = $request->path();
        return view('vistas.agregar-vendedor' , ['path' => $path]);
    }

    function store(Request $request){
        
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'zona' => 'required',
        ]);

        $password = 'Vendedor2024';

        Vendor::create([
            'name' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'zona' => $request->zona,
            'password' => bcrypt($password),
        ]);

        return redirect('vendedores')->with('success', 'Vendedor creado correctamente, la contraseña temporal es: Vendedor2024');

       
    }

    function edit(Request $request, $id){
        $path = $request->path();
        $vendedor = Vendor::find($id);
        return view('vistas.editar-vendedor' , ['path' => $path, 'vendedor' => $vendedor]);
    }

    function update(Request $request, $id){
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'zona' => 'required',
        ]);

        $vendedor = Vendor::find($id);
        $vendedor->name = $request->nombre;
        $vendedor->apellido_paterno = $request->apellido_paterno;
        $vendedor->apellido_materno = $request->apellido_materno;
        $vendedor->email = $request->email;
        $vendedor->telefono = $request->telefono;
        $vendedor->zona = $request->zona;
        $vendedor->save();

        return redirect('vendedores')->with('success', 'Vendedor actualizado correctamente');

    }

    function destroy(Request $request, $id){
        $vendedor = Vendor::find($id);
        $vendedor->delete();
        return redirect('vendedores')->with('success', 'Vendedor eliminado correctamente');
    }
}
