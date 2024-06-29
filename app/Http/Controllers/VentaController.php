<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\proceso_muestras;
use App\Models\prueba_venta;
use App\Models\Test;
use App\Models\User;
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
        $user = auth()->user();
        $rol = $request->user()->role->name;
        $paciente = Patient::find($id);

        $ultimopaciente = venta::latest()->first(); 
        $ultimoId = $ultimopaciente ? intval(substr($ultimopaciente->n_venta, 5)) : 0;
        $Order = 'NV' . str_pad($ultimoId + 1, 4, '0', STR_PAD_LEFT);
        $vendedores = User::where('role_id', 4)->with('vendor')->get(); // Obtener vendedores con su relación
       
   
        
        $doctores = Doctor::orderBy('name')->get();
        
        $aseguradora = Insurance::where('id', $paciente->insurance_id)->first();
        $pruebas = Test::all();



        return view('vistas.agregar-venta-admin', compact('path', 'paciente', 'vendedores', 'pruebas', 'aseguradora', 'user', 'rol', 'doctores', 'Order'));
    }

    function store(Request $request, $id)
    {

        
        // dd($request->all());
        
        $request->validate([
            'vendedor' => 'required',
            'subtotal' =>'required',
            'total' => 'required',
            'lugar_toma' =>'required',
            'metodo_pago' => 'required',
            'pruebas' => 'required',
        ]);
        
        $ultimopaciente = venta::latest()->first(); // se hace una consulta a patient y se ordena decendentemente y se toma al primero
        //uso de operacion ternaria
        //donde se compara, si el ultimo paciente es null significa que no hay pacientes y se guarda el valor de 0 en ultimo id
        //si hay minimo un paciente es true y con el metodo se obtiene solo despues de el quinto caracteres("NOMAD0000") 
        $ultimoId = $ultimopaciente ? intval(substr($ultimopaciente->n_venta, 5)) : 0;

        // en esta funcion se toma el id del ultimo usuario y se le suma uno y se ponen 3 ceros a la derecha gracias a la funcion str_pad_left
        $nomenclatura = 'NV' . str_pad($ultimoId + 1, 4, '0', STR_PAD_LEFT);

        // Encontrar id del vendedor segun su id de usuario
        $id_vendedor = User::find($request->vendedor)->vendor->id;
        venta::create([
            'n_venta' => $nomenclatura,
            'patient_id' => $id,
            'vendor_id' =>  $id_vendedor,
            'id_doctor' => $request->doctor,
            'total' => $request->total,
            'fecha_venta' => date('Y-m-d'),
            'metodo_pago' => $request->metodo_pago,
            'lugar_toma' => $request->lugar_toma,
        ]);

        $ultimaVenta = venta::latest('id')->first()->id;
        
        foreach ($request->pruebas as $prueba) {

            proceso_muestras::create([
                'venta_id' => $ultimaVenta,
                'patient_id' => $id,
                'fecha_toma_muestra' => null,
                'fecha_envio_lab' => null,
                'fecha_resultado' => null ,
                'prueba_id' => $prueba,
                'estado' => 'En proceso',
            ]);
        }


       
        return redirect()->route('pruebas-paciente', $id)->with('agregado', 'Venta creada correctamente');
}
}