<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\proceso_muestras;
use App\Models\prueba_venta;
use App\Models\Test;
use App\Models\User;
use App\Models\venta;
use Database\Seeders\UsersSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

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
        $vendedores = DB::table('vendors')
        ->join('users', 'vendors.id_usuario', '=', 'users.id') // Ajusta 'id_usuario' al nombre correcto de la columna
        ->select('vendors.*', 'users.name as user_name')
        ->get();
        $aseguradoras = Insurance::all();
        $pruebas = Test::all();

        return view('vistas.agregar-venta-admin', compact('path', 'paciente', 'vendedores', 'pruebas', 'aseguradoras', ));
    }

    public function store(Request $request, $id)
{
    // Validar los datos del request
    $validatedData = $request->validate([
        'vendedor' => 'required|integer',
        'metodo_pago' => 'required|string',
        'total' => 'required|numeric',
        'pruebas' => 'required|string', // Validar que pruebas sea una cadena JSON
    ]);

    // Decodificar el JSON de pruebas
    $pruebas = json_decode($validatedData['pruebas'], true);

    if (!is_array($pruebas)) {
        return redirect()->back()->withErrors(['pruebas' => 'El campo pruebas debe ser un array.']);
    }
    // Crear la venta y asociar las pruebas
    foreach ($pruebas as $prueba) {
        $venta = venta::create([
            'patient_id' => $id,
            'vendor_id' => $validatedData['vendedor'],
            'prueba_id' => $prueba,
            'total' => $validatedData['total'],
            'fecha_venta' => date('Y-m-d'),
            'metodo_pago' => $validatedData['metodo_pago'],
        ]);

        proceso_muestras::create([
            'venta_id' => $venta->id,
            'patient_id' => $id,
            'fecha_toma_muestra' => null,
            'fecha_envio_lab' => null,
            'fecha_resultado' => null,
            'estado' => 'En proceso',
        ]);
    }

    // Redirigir con un mensaje de éxito
    return redirect()->route('pruebas-paciente', $id)->with('agregado', 'Venta creada correctamente');
}

}
