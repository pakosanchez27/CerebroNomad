<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class VistaPruebasController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');    
    }
     function index(Request $request){
        $path = $request->path();
        $pruebas = Test::all();
        return view('vistas.pruebas' , ['path' => $path , 'pruebas' => $pruebas]);
    }

     function create(Request $request){
        $path = $request->path();
        return view('vistas.agregar-prueba' , ['path' => $path]);
    }

     function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Test::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);


        return redirect()->route('pruebas')->with('agregado', 'Prueba creada correctamente');
    }

     function edit(Request $request, $id){
        $path = $request->path();
        $prueba = Test::find($id);
        return view('vistas.editar-prueba' , ['path' => $path , 'prueba' => $prueba]);
    }

     function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $prueba = Test::find($id);
        $prueba->name = $request->name;
        $prueba->description = $request->description;
        $prueba->price = $request->price;
        $prueba->save();

        return redirect()->route('pruebas')->with('editado', 'Prueba editada correctamente');
    }

        function destroy(Request $request, $id){
            $prueba = Test::find($id);
            $prueba->delete();
            return redirect()->route('pruebas')->with('eliminado', 'Prueba eliminada correctamente');
        }
}
