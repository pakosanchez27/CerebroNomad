<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        $path = $request->path(); // Obtener la parte de la URL después del dominio
        $rol = $request->user()->role->name;
        $ganacias = DB::table('ventas')
            ->sum('total');

        
        $users = User::take(10)->get();

        $vendedores = Vendor::all();
        // Total de pacientes
        $totalPacientes = Patient::count();
        // Total doctores
        $totalDoctores = Doctor::count();
        //total de vendedores
        $totalVendedores = User::where('role_id', 4)->count();

    
       $userId = Auth::id();
        $vendorId = DB::table('vendors')
            ->where('id_usuario', $userId)
            ->value('id');

        // Usando el Constructor de Consultas
        $totalVentas = DB::table('ventas')
            ->where('vendor_id', $vendorId)
            ->count();
            // ->value('id');

            $ventasid = DB::table('ventas')
            ->where('vendor_id', $vendorId)
            ->value('id');

            // $totalPruebasPendientes = DB::table('proceso_muestras')
            // ->where('venta_id', $ventasid)
            // ->where('proceso_muestras.estado', '!=', 'completado')
            // ->count();
           // Obtener el total de pruebas pendientes
           $totalPruebasPendientes = DB::table('proceso_muestras')
                ->join('ventas', 'proceso_muestras.venta_id', '=', 'ventas.id')
               ->where('ventas.vendor_id', $vendorId)
                ->where('proceso_muestras.estado', '!=', 'completado')
              ->count();

        return view('vistas/home', ['path' => $path, 'users' => $users, 'vendedores' => $vendedores, 'totalPacientes' => $totalPacientes, 'totalDoctores' => $totalDoctores, 'totalVendedores' => $totalVendedores, 'rol' => $rol,'totalVentas' => $totalVentas, 'totalPruebasPendientes' => $totalPruebasPendientes, 'ganacias' => $ganacias]);
    }
}