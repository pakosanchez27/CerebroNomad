<?php

namespace App\Http\Controllers;

use App\Models\proceso_muestras;
use Illuminate\Database\Query\Processors\Processor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class VistaFinanzasController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');    
    }
    
    function index(Request $request){
        $path = $request->path();
        $vendorId = Auth::user()->vendor_id; // Obtener el vendor_id del usuario autenticado

        $userId = Auth::id();
        $vendorId = DB::table('vendors')
        ->where('id_usuario', $userId)
        ->value('id');

        $pacientes = proceso_muestras::query()
        ->join('ventas', 'proceso_muestras.venta_id', '=', 'ventas.id')
       ->where('ventas.vendor_id', $vendorId)
        ->where('proceso_muestras.estado', '!=', 'completado')
        ->get();
        return view('vistas.finanzas', ['path' => $path,'pacientes' => $pacientes]);

       //return response()->json( $pacientes);
    }
}
    
