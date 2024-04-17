<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Doctor;
use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use Illuminate\Http\Request;

class ProcesoMuetrasController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show(Request $request, $id)
    {
        $path = $request->path();
        $paciente = Patient::find($id);
        $vendedores = Vendor::all();
        $aseguradora = Insurance::where('id', $paciente->insurance_id)->first();
;
        $pruebas = Test::all();

        return view('vistas.pruebas-paciente', compact('path', 'paciente', 'vendedores', 'pruebas', 'aseguradora'));

    }
}
