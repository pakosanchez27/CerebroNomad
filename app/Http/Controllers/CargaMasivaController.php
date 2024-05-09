<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;


class CargaMasivaController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $path = $request->path();
        return view('vistas.carga-masiva', ['path' => $path]);
    }

    public function uploadPacientes(Request $request)
    {
        $PacientesCompleto = Patient::all();

        return (new FastExcel($PacientesCompleto))->download('Usuarios.xlsx');
    }
}
