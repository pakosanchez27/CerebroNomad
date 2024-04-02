<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class VistaDoctoresController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');    
    }
    
    function index(Request $request)
    {
        $path = $request->path();
        $doctores = Doctor::all();
        return view('vistas.doctores', ['path' => $path, 'doctores' => $doctores]);
    }

    function create(Request $request)
    {
        $path = $request->path();
        return view('vistas.agregar-doctor', ['path' => $path]);
    }

    function store(Request $request)
    {

  
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'especialidad' => 'required',
            'cedula' => 'required',
            'nombre_clinica' => 'required',

        ]);


        Doctor::create([
            'name' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'sexo' => $request->sexo,
            'telefono' => $request->telefono,
            'especialidad' => $request->especialidad,
            'email' => $request->email,
            'cedula' => $request->cedula,
            'nombre_clinica' => $request->nombre_clinica,
            'asistente' => $request->asistente,
            'telefono_asistente' => $request->telefono_asistente,
            'email_asistente' => $request->email_asistente,
        ]);
        return redirect()->route('doctores')->with('agregado', 'Doctor creado exitosamente');
    }

     function show(Request $request, $id)
    {
        $path = $request->path();
        $doctor = Doctor::findOrFail($id);
        return view('vistas.ver-doctor', compact('doctor', 'path'));
    }

     function edit(Request $request, $id)
    {
        $path = $request->path();
        $doctor = Doctor::findOrFail($id);
        return view('vistas.editar-doctor', compact('doctor', 'path'));
    }

    function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'especialidad' => 'required',
            'cedula' => 'required',
            'nombre_clinica' => 'required',

        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->nombre;
        $doctor->apellido_paterno = $request->apellido_paterno;
        $doctor->apellido_materno = $request->apellido_materno;
        $doctor->sexo = $request->sexo;
        $doctor->telefono = $request->telefono;
        $doctor->especialidad = $request->especialidad;
        $doctor->email = $request->email;
        $doctor->cedula = $request->cedula;
        $doctor->nombre_clinica = $request->nombre_clinica;
        $doctor->asistente = $request->asistente;
        $doctor->telefono_asistente = $request->telefono_asistente;
        $doctor->email_asistente = $request->email_asistente;
        $doctor->save();
        return redirect()->route('doctores')->with('actualizado', 'Doctor editado exitosamente');
    }

    function destroy(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctores')->with('eliminado', 'Doctor eliminado exitosamente');
    }
}
