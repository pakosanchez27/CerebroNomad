<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Address;
use App\Models\Guardian;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\venta;




use Illuminate\Http\Request;class VistaPacienteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(request $request)
    {
        $path = $request->path();
        $rol = $request->user()->role->name;
        $pacientes = Patient::orderBy('created_at', 'desc')->paginate(10);
        $current_page = $pacientes->currentPage();
        return view('vistas.pacientes', ['path' => $path , 'pacientes' => $pacientes, 'current_page' => $current_page, 'rol' => $rol]);
    }

    public function show(request $request, $id)
    {
        $path = $request->path();
        $paciente = Patient::find($id);
        $aseguradora = Insurance::find($paciente->insurance_id);
        $doctor = Doctor::find($paciente->doctor_id);
        $direccion = Address::where('patient_id', $paciente->id)->first();
        $responsable = Guardian::where('patient_id', $paciente->id)->first();
        return view('vistas.ver-paciente', ['path' => $path, 'paciente' => $paciente , 'aseguradora' => $aseguradora, 'doctor' => $doctor, 'direccion' => $direccion, 'responsable' => $responsable]);
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
            'name' => 'required|alpha|min:3',
            'apellido_paterno' => 'required|alpha|min:3',
            'apellido_materno' => 'required|alpha|min:3',
            'fecha_nacimiento' => 'required',
            'tipo_sangre' => 'required',
            'tipo_identificacion' => 'required',
            'numero_identificacion' => 'required',
            'telefono' => 'required|digits_between:8,15',
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

    public function edit(request $request, $id)
    {
        $path = $request->path();
        $paciente = Patient::find($id);
        $aseguradoras = Insurance::all();
        $doctores = Doctor::all();
        return view('vistas.editar-paciente', ['path' => $path , 'paciente' => $paciente, 'aseguradoras' => $aseguradoras , 'doctores' => $doctores]);
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'apellido_paterno' => 'required',
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

        $paciente = Patient::find($id);
        $paciente->name = $request->name;
        $paciente->apellido_paterno = $request->apellido_paterno;
        $paciente->apellido_materno = $request->apellido_materno;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->sexo = $request->sexo;
        $paciente->tipo_sangre = $request->tipo_sangre;
        $paciente->tipo_identificacion = $request->tipo_identificacion;
        $paciente->num_identificacion = $request->numero_identificacion;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        $paciente->insurance_id = $request->aseguradora;
        $paciente->doctor_id = $request->doctor;
        $paciente->descripcion_medica = $request->descripcion_medica;
        $paciente->save();

        return redirect()->route('pacientes')->with('editado', 'Paciente editado correctamente');
    }

    public function destroy($id)
    {
        // Encuentra al paciente por su ID
        $paciente = Patient::find($id);

        // Elimina al paciente
        $paciente->delete();

        // Elimina las ventas asociadas al paciente usando su ID
        Venta::where('patient_id', $id)->delete();

        // Redirige con un mensaje de éxito
        return redirect()->route('pacientes')->with('eliminado', 'Paciente eliminado correctamente');
    }

    public function expe()
    {
        return view('vistas.ver-expediente-paciente');
    }
}
