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

        // obtener id del paciente
        $paciente = Patient::find($id);

        $venta = venta::create([
            'patient_id' => $id,
            'vendor_id' => $request->vendedor,
            'total' => $request->total,
            'fecha_venta' => date('Y-m-d'),
            'metodo_pago' => $request->metodo_pago,
        ]);
        
        if ($venta) {
            if ($request->has('pruebas')) {
                foreach ($request->pruebas as $pruebaId) {
                    $prueba = Test::find($pruebaId);
                    if ($prueba) {
                        prueba_venta::create([
                            'venta_id' => $venta->id,
                            'prueba_id' => $pruebaId,
                            'subtotal' => $prueba->price,
                            'precio' => $prueba->price,
                            'cantidad' => 1,
                        ]);
        
                        proceso_muestras::create([
                            'venta_id' => $venta->id,
                            'prueba_id' => $pruebaId,
                            'estado' => 'Muestras',
                        ]);
                    }
                }
            }
        } else {
            // Manejar el caso en el que la venta no se creó correctamente
        }
        

        return redirect()->route('pruebas-paciente', $id)->with('agregado', 'Venta creada correctamente');
}
}