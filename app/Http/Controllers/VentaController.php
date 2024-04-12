<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\Test;
use Illuminate\Http\Request;

class VentaController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');    
    }
    //  
    function create(Request $request, $id){
       
        $path = $request->path();
        $paciente= Patient::find($id);
        $vendedores = Vendor::all();
        $aseguradora = Insurance::where('id', $paciente->insurance_id)->first();
        $pruebas = Test::all();
    
          

        return view('vistas.agregar-venta-admin', compact('path','paciente','vendedores','pruebas','aseguradora'));
    }

    function store(Request $request, $id){
        dd($request->all(), $id);
    }
}
