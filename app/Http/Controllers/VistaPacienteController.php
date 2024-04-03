<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Insurance;
use App\Models\Patient;
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
        $pacientes = Patient::all();
        return view('vistas.pacientes', ['path' => $path , 'pacientes' => $pacientes]);
    }

    public function show(request $request, $id)
    {
        $path = $request->path();
        $paciente = Patient::find($id);
        return view('vistas.ver-paciente', ['path' => $path, 'paciente' => $paciente]);
    }

    public function create(request $request)
    {
        $path = $request->path();
        $aseguradoras = Insurance::all();
        $doctores = Doctor::all();
        return view('vistas.agregar-paciente', ['path' => $path , 'aseguradoras' => $aseguradoras , 'doctores' => $doctores]);
    }

    public function store(request $request)
    {
        

        $request->validate([
            'name' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'fecha_nacimiento' => 'required',
            'tipo_sangre' => 'required',
            'tipo_identificacion' => 'required',
            'numero_identificacion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',   
            'aseguradora' => 'required',
            'doctor' => 'required',
            'descripcion_medica' => 'required',
        ]);
       
        Patient::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => $request->sexo,
            'tipo_sangre' => $request->tipo_sangre,
            'tipo_identificacion' => $request->tipo_identificacion,
            'num_identificacion' => $request->numero_identificacion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'insurance_id' => $request->aseguradora,
            'doctor_id' => $request->doctor,
            'descripcion_medica' => $request->descripcion_medica,
        ]);

        return redirect()->route('pacientes')->with('agregado', 'Paciente creado correctamente');
    }

}
