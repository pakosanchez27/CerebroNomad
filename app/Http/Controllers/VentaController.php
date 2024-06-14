<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\proceso_muestras;
use App\Models\Test;
use App\Models\User;
use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request, $id)
    {
        $paciente = Patient::find($id);
        $vendedores = DB::table('vendors')
            ->join('users', 'vendors.id_usuario', '=', 'users.id')
            ->select('vendors.id as id_usuario', 'users.name as user_name')
            ->get();
        $aseguradoras = Insurance::all();
        $pruebas = Test::all();

        return view('vistas.agregar-venta-admin', compact('paciente', 'vendedores', 'pruebas', 'aseguradoras'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'vendedor' => 'required|integer',
            'metodo_pago' => 'required|string',
            'subtotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'total' => 'required|numeric',
            'pruebas' => 'required|string', // Validar que pruebas sea una cadena JSON
        ]);

        $pruebas = json_decode($validatedData['pruebas'], true);

        if (!is_array($pruebas)) {
            return redirect()->back()->withErrors(['pruebas' => 'El campo pruebas debe ser un array.']);
        }

        foreach ($pruebas as $pruebaId) {
            $venta = venta::create([
                'patient_id' => $id,
                'vendor_id' => $validatedData['vendedor'],
                'prueba_id' => $pruebaId,
                'total' => $validatedData['total'],
                'fecha_venta' => now(),
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

        return redirect()->route('pruebas-paciente', $id)->with('agregado', 'Venta creada correctamente');
    }
}
