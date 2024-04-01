<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        
        $path = $request->path(); // Obtener la parte de la URL después del dominio
        $users = User::take(10)->get();
        $vendedores = Vendor::all();
        // Total de pacientes
        $totalPacientes = User::count();
        // Total doctores
        $totalDoctores = Doctor::count();
        //total de vendedores
        $totalVendedores = Vendor::count();
        return view('vistas/home' , ['path' => $path, 'users' => $users , 'vendedores' => $vendedores, 'totalPacientes' => $totalPacientes, 'totalDoctores' => $totalDoctores , 'totalVendedores' => $totalVendedores ] );
    }
}
