<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class VistaDireccionesController extends Controller
{

    public function index()
    {
        return view('direcciones.index');
    }

    public function create()
    {
        return view('direcciones.create');
    }

    public function show($id)
    {
        return view('direcciones.show');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'calle' => 'required',
            'numero' => 'required',
            'colonia' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'codigo_postal' => 'required',
            'pais' => 'required',
            'referencias' => 'required',
        ]);

        Address::create([
            'calle' => $request->calle,
            'numero' => $request->numero,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'codigo_postal' => $request->codigo_postal,
            'pais' => $request->pais,
            'referencias' => $request->referencias,
            'patient_id' => $request->patient_id,
        ]);

        return redirect()->back()->with('agregado', 'Dirección creada correctamente');
    }

    public function edit($id)
    {
        return view('direcciones.edit');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'calle' => 'required',
            'numero' => 'required',
            'colonia' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'codigo_postal' => 'required',
            'pais' => 'required',
            'referencias' => 'required',
        ]);

        $address = Address::find($id);
        $address->calle = $request->calle;
        $address->numero = $request->numero;
        $address->colonia = $request->colonia;
        $address->ciudad = $request->ciudad;
        $address->estado = $request->estado;
        $address->codigo_postal = $request->codigo_postal;
        $address->pais = $request->pais;
        $address->referencias = $request->referencias;
        $address->save();

        return redirect()->back()->with('editado', 'Dirección editada correctamente');
    }

    public function destroy($id)
    {
        return view('direcciones.destroy');
    }
}
