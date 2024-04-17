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

        venta::create([
            'patient_id' => $id,
            'vendor_id' => $request->vendedor,
            'total' => $request->total,
            'fecha_venta' => date('Y-m-d'),
            'metodo_pago' => $request->metodo_pago,
        ]);

        if ($request->has('pruebas')) {
            foreach ($request->pruebas as $pruebaId) {
                $prueba = Test::find($pruebaId);
                if ($prueba) {
                    prueba_venta::create([
                        'venta_id' => venta::max('id'),
                        'prueba_id' => $pruebaId,
                        'subtotal' => $prueba->price,
                        'precio' => $prueba->price,
                        'cantidad' => 1,
                    ]);
                }
            }
        }
        
        proceso_muestras::create([
            'venta_id' => venta::max('id'),
            'estado' => 'Muestras',
        ]);

        return view('pruebas-paciente', $id)->with('success', 'Venta creada con éxito, ahora puedes agendar la toma de muestras.');
    }
}
