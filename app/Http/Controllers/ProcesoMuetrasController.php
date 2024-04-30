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

        $pruebas = proceso_muestras::where('proceso_muestras.patient_id', $id)
        ->join('ventas', 'proceso_muestras.venta_id', '=', 'ventas.id')
        ->join('tests', 'ventas.prueba_id', '=', 'tests.id')
        ->select('tests.name as prueba', 'proceso_muestras.*', 'proceso_muestras.id as id_proceso')
        ->get();


        // Nombre de las pruebas que pertenecen al id de venta

        return view('vistas.pruebas-paciente', compact('path', 'paciente', 'vendedores', 'pruebas', 'aseguradora'));
    }

    function AgendarToma(Request $request, $idPM, $idP)
    {

        $request->validate([
            'visita' => 'required',
            'hora' => 'required',
        ]);

        // actualizar la fecha y hora de la toma de muestra
        $proceso = proceso_muestras::find($idPM);
        $proceso->fecha_toma_muestra = $request->visita;
        $proceso->hora_toma_muestra = $request->hora;
        $proceso->estado = 'Agendado';
        $proceso->save();


        return back()->with('success', 'Toma de muestra agendada correctamente');
    }

    function AgendarResultados(Request $request, $idPM, $idP)
    {

        $request->validate([
            'visita' => 'required',
        ]);

        // actualizar la fecha de envio al laboratorio
        $proceso = proceso_muestras::find($idPM);
        $proceso->fecha_resultado = $request->visita;
        $proceso->estado = 'Enviado';
        $proceso->save();

        return back()->with('success', 'Envio al laboratorio agendado correctamente');
    }


    function completarEntrega(Request $request, $idPM, $idP)
    {
        $proceso = proceso_muestras::find($idPM);
        $proceso->estado = 'completado';
        $proceso->save();

        return back()->with('Completado', 'Entrega completada correctamente');
    }
}
