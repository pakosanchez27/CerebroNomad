<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\proceso_muestras;
use App\Models\prueba_venta;
use App\Models\Test;
use App\Models\venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    //  
    function create(Request $request, $id)
    {

        $path = $request->path();
        $paciente = Patient::find($id);
        $vendedores = Vendor::all();
        $aseguradora = Insurance::where('id', $paciente->insurance_id)->first();
        $pruebas = Test::all();



        return view('vistas.agregar-venta-admin', compact('path', 'paciente', 'vendedores', 'pruebas', 'aseguradora'));
    }

    function store(Request $request, $id)
    {

        
     
        
        foreach ($request->pruebas as $prueba) {
            
            venta::create([
                'patient_id' => $id,
                'vendor_id' => $request->vendedor,
                'prueba_id' => $prueba,
                'total' => $request->total,
                'fecha_venta' => date('Y-m-d'),
                'metodo_pago' => $request->metodo_pago,
            ]);

            proceso_muestras::create([
                'venta_id' => venta::latest('id')->first()->id,
                'patient_id' => $id,
                'fecha_toma_muestra' => null,
                'fecha_envio_lab' => null,
                'fecha_resultado' => null ,
                'estado' => 'En proceso',
            ]);
        }


       
        return redirect()->route('pruebas-paciente', $id)->with('agregado', 'Venta creada correctamente');
}
}