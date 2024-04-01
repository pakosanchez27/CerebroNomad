<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class VistaAseguradorasController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');    
    }
    function index(Request $request)
    {
        $path = $request->path();
        $aseguradoras = Insurance::all();
        return view('vistas.aseguradoras', ['path' => $path, 'aseguradoras' => $aseguradoras]);
    }


    function create(Request $request)
    {
        $path = $request->path();
        return view('vistas.agregar-aseguradora', ['path' => $path]);
    }


    function store(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'representante' => 'required',
            'telefono' => 'required|numeric|min:10',
            'email' => 'required|email',
        ]);

        Insurance::create([
            'name' => $request->nombre,
            'representante' => $request->representante,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        return redirect()->route('aseguradoras')->with('agregado', 'Aseguradora agregada correctamente');
    }

    function edit(Request $request, $id)
    {
        $path = $request->path();
        $aseguradora = Insurance::find($id);
        return view('vistas.editar-aseguradora', ['path' => $path, 'aseguradora' => $aseguradora]);
    }

    function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'representante' => 'required',
            'telefono' => 'required|numeric|min:10',
            'email' => 'required|email',
        ]);

        $aseguradora = Insurance::find($id);
        $aseguradora->name = $request->nombre;
        $aseguradora->representante = $request->representante;
        $aseguradora->telefono = $request->telefono;
        $aseguradora->email = $request->email;
        $aseguradora->save();

        return redirect()->route('aseguradoras')->with('actualizado', 'Aseguradora actualizada correctamente');
    }

    function destroy(Request $request, $id)
    {
        $aseguradora = Insurance::find($id);
        $aseguradora->delete();
        return back()->with('eliminado', 'Aseguradora eliminada correctamente');
    }
}
