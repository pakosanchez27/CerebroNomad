<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Insurance;
use App\Models\Patient;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use LDAP\Result;
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
        $request->validate([
            'filePacientes' => 'required|file|mimes:xlsx,xls', // Agrega una regla para validar el tipo de archivo
        ]);

        try {
            $file = $request->file('filePacientes');

            // Validar el nombre del archivo
            if ($file->getClientOriginalName() != 'CargaPacientes.xlsx') {
                return back()->with('error', 'El nombre del archivo no es el esperado. Por favor, asegúrate de cargar el archivo correcto. "CargaPacientes"');
            }

            $collection = (new FastExcel)->import($file);

            foreach ($collection as $row) {
                // Validar que los datos sean compatibles con la tabla Patient
                if (
                    !isset($row['nombre']) ||
                    !isset($row['apellido_paterno']) ||
                    !isset($row['apellido_materno']) ||
                    !isset($row['sexo']) ||
                    !isset($row['num_identificacion']) ||
                    !isset($row['email']) ||
                    !isset($row['telefono']) ||
                    !isset($row['fecha_nacimiento']) ||
                    !isset($row['tipo_sangre']) ||
                    !isset($row['Aseguradora']) ||
                    !isset($row['Cedula']) ||
                    !isset($row['descripcion_medica'])
                ) {
                    return back()->with('error', 'El archivo no tiene el formato correcto');
                }


                // Validaciones y converciones

                $row['fecha_nacimiento'] = $row['fecha_nacimiento']->format('Y-m-d');

                // Buscar y traer el id de la aseguradora
                $insurance = Insurance::where('name', $row['Aseguradora'])->first();
            

                // Buscar y traer el id del doctor segun la cedula
                $doctor = Doctor::where('cedula', $row['Cedula'])->first();

                // Crear el nuevo registro de Patient
                Patient::create([
                    'name' => $row['nombre'],
                    'apellido_paterno' => $row['apellido_paterno'],
                    'apellido_materno' => $row['apellido_materno'],
                    'sexo' => $row['sexo'],
                    'fecha_nacimiento' => $row['fecha_nacimiento'],
                    'num_identificacion' => $row['num_identificacion'],
                    'email' => $row['email'],
                    'telefono' => $row['telefono'],
                    'tipo_sangre' => $row['tipo_sangre'],
                    'descripcion_medica' => $row['descripcion_medica'],
                    'insurance_id' =>  $insurance->id,
                    'doctor_id' => $doctor->id,
                    'tipo_identificacion' => $row['tipo_identificacion'],
                ]);
                return redirect()->route('carga-masiva.index')->with('Cargado', 'Aseguradoras cargadas correctamente');

            }
        } catch (\Throwable $e) {
            // Manejar la excepción
            return back()->with('error', 'Se produjo un error durante la carga de datos: ' . $e->getMessage());
        }
    }
    public function uploadAseguradoras(Request $request)
    {
        $request->validate([
            'fileAseguradora' => 'required|file|mimes:xlsx,xls', // Agrega una regla para validar el tipo de archivo
        ]);

        try {
            $file = $request->file('fileAseguradora');

            // Validar el nombre del archivo
            if ($file->getClientOriginalName() != 'CargaAseguradora.xlsx') {
                return back()->with('error', 'El nombre del archivo no es el esperado. Por favor, asegúrate de cargar el archivo correcto. "CargaAseguradora"');
            }

            $collection = (new FastExcel)->import($file);

            foreach ($collection as $row) {
                // Validar que los datos sean compatibles con la tabla Insurance
                if (!isset($row['nombre']) || !isset($row['representante']) || !isset($row['telefono']) || !isset($row['email'])) {
                    return back()->with('error', 'El archivo no tiene el formato correcto. Asegúrate de que las columnas sean: nombre, representante, telefono, email');
                }

                // Opcionalmente, puedes validar más detalles como el formato del correo electrónico, números de teléfono, etc.

                // Crear el nuevo registro de Insurance
                Insurance::create([
                    'name' => $row['nombre'],
                    'representante' => $row['representante'],
                    'telefono' => $row['telefono'],
                    'email' => $row['email'],
                ]);
            }

            return redirect()->route('carga-masiva.index')->with('Cargado', 'Aseguradoras cargadas correctamente');
        } catch (\Throwable $e) {
            // Manejar la excepción
            return back()->with('error', 'Se produjo un error durante la carga de datos: ' . $e->getMessage());
        }
    }

    public function uploadDoctores(Request $request)
    {
        $request->validate([
            'fileDoctor' => 'required|file|mimes:xlsx,xls', // Agrega una regla para validar el tipo de archivo
        ]);

        try {
            $file = $request->file('fileDoctor');

            // Validar el nombre del archivo
            if ($file->getClientOriginalName() != 'CargaDoctores.xlsx') {
                return back()->with('error', 'El nombre del archivo no es el esperado. Por favor, asegúrate de cargar el archivo correcto. "CargaDoctores"');
            }

            $collection = (new FastExcel)->import($file);

            foreach ($collection as $row) {
                // Validar que los datos sean compatibles con la tabla Patient
                if (!isset($row['nombre']) || !isset($row['apellidoP']) || !isset($row['apellidoM']) || !isset($row['sexo']) || !isset($row['email']) || !isset($row['telefono']) || !isset($row['especialidad']) || !isset($row['cedula']) || !isset($row['clinica']) || !isset($row['asistente']) || !isset($row['telefono_asistente']) || !isset($row['email_asistente'])) {
                    return back()->with('error', 'El archivo no tiene el formato correcto. Asegúrate de que las columnas sean: nombre, apellidoP, apellidoM, sexo, email, telefono, especialidad, cedula, nombre_clinica, asistente, telefono_asistente, email_asistente');
                }

                // Opcionalmente, puedes validar más detalles como el formato del correo electrónico, números de teléfono, etc.

                // Crear el nuevo registro de Patient
                Doctor::create([
                    'name' => $row['nombre'],
                    'apellido_paterno' => $row['apellidoP'],
                    'apellido_materno' => $row['apellidoM'],
                    'sexo' => $row['sexo'],
                    'email' => $row['email'],
                    'telefono' => $row['telefono'],
                    'especialidad' => $row['especialidad'],
                    'cedula' => $row['cedula'],
                    'nombre_clinica' => $row['clinica'],
                    'asistente' => $row['asistente'],
                    'telefono_asistente' => $row['telefono_asistente'],
                    'email_asistente' => $row['email_asistente'],

                ]);
            }

            return redirect()->route('carga-masiva.index')->with('Cargado', 'Pacientes cargados correctamente');
        } catch (\Throwable $e) {
            // Manejar la excepción
            return back()->with('error', 'Se produjo un error durante la carga de datos: ' . $e->getMessage());
        }
    }

    public function uploadPruebas(Request $request)
    {
        $request->validate([
            'filePruebas' => 'required|file|mimes:xlsx,xls', // Agrega una regla para validar el tipo de archivo
        ]);

        try {
            $file = $request->file('filePruebas');

            // Validar el nombre del archivo
            if ($file->getClientOriginalName() != 'CargaPruebas.xlsx') {
                return back()->with('error', 'El nombre del archivo no es el esperado. Por favor, asegúrate de cargar el archivo correcto. "CargaPruebas"');
            }

            $collection = (new FastExcel)->import($file);

            foreach ($collection as $row) {
                // Validar que los datos sean compatibles con la tabla Patient
                if (!isset($row['nombre']) || !isset($row['precio']) || !isset($row['descripcion'])) {
                    return back()->with('error', 'El archivo no tiene el formato correcto. Asegúrate de que las columnas sean: nombre, precio, descripcion');
                }

                // Opcionalmente, puedes validar más detalles como el formato del correo electrónico, números de teléfono, etc.

                // Crear el nuevo registro de Patient
                Test::create([
                    'name' => $row['nombre'],
                    'price' => $row['precio'],
                    'description' => $row['descripcion'],
                ]);
            }

            return redirect()->route('carga-masiva.index')->with('Cargado', 'Pacientes cargados correctamente');
        } catch (\Throwable $e) {
            // Manejar la excepción
            return back()->with('error', 'Se produjo un error durante la carga de datos: ' . $e->getMessage());
        }
    }
}
