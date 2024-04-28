<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\venta;
use App\Models\Doctor;
use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\prueba_venta;
use Illuminate\Http\Request;
use App\Models\proceso_muestras;
use Illuminate\Support\Facades\DB;

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


        // Obtener todas las ventas asociadas al ID del paciente
        $ventas = Venta::where('patient_id', $id)->get();
        
        foreach ($ventas as $venta) {
            // nombre de las pruebas
            $PruebasName = prueba_venta::where('venta_id', $venta->id)
                ->join('tests', 'prueba_ventas.prueba_id', '=', 'tests.id')
                ->select('tests.name')
                ->get();
        
            $pruebaFechas = proceso_muestras::where('venta_id', $venta->id)
                ->select('fecha_toma_muestra as fechaMuestra','fecha_resultado as FechaFin', 'estado')
                ->get();
        
            $mergedArray = [];
        
            foreach ($PruebasName as $index => $pruebaName) {
                $mergedArray[$index]['prueba'] = $pruebaName->name;
            }
            
            foreach ($pruebaFechas as $index => $pruebaFecha) {
                $mergedArray[$index]['fechaMuestra'] = $pruebaFecha->fechaMuestra;
                $mergedArray[$index]['FechaFin'] = $pruebaFecha->FechaFin;
                $mergedArray[$index]['estado'] = $pruebaFecha->estado;
            }

            
        }
        
      
 
        // Nombre de las pruebas que pertenecen al id de venta

        return view('vistas.pruebas-paciente', compact('path', 'paciente', 'vendedores', 'aseguradora'));
    }
}
