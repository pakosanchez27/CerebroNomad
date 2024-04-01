<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Insurance;
use Illuminate\Http\Request;

class VistaPacienteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');    
    }

    public function index(request $request)
    {
        $path = $request->path();
        return view('vistas.pacientes', ['path' => $path]);
    }

    public function show(request $request, $id)
    {
        $path = $request->path();
        return view('vistas.pacientes', ['path' => $path]);
    }

    public function create(request $request)
    {
        $path = $request->path();
        $aseguradoras = Insurance::all();
        $doctor = Doctor::all();
        return view('vistas.agregar-paciente', ['path' => $path , 'aseguradoras' => $aseguradoras , 'doctor' => $doctor]);
    }
}
