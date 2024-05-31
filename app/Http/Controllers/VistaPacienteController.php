<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Address;
use App\Models\Guardian;
use App\Models\Patient;
use App\Models\Insurance;
use App\Models\proceso_muestras;
use App\Models\venta;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\VarLikeIdentifier;

class VistaPacienteController extends Controller
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
        return view('vistas.pacientes', ['path' => $path, 'pacientes' => $pacientes, 'current_page' => $current_page, 'rol' => $rol]);
    }

    public function search(request $request)
    {
        $path = $request->path();
        $rol = $request->user()->role->name;
        $current_page = $request->input('page', 1);


        //validando datos porque el fomulario se dejo sin restriccion 
        $validatedData = $request->validate([
            'Nombre' => 'nullable|regex:/^[\pL\s.]+$/u|max:100',
            'ApellidoPaterno' => 'nullable|regex:/^[\pL\s.]+$/u|max:100',
            'ApellidoMaterno' => 'nullable|regex:/^[\pL\s.]+$/u|max:100',
        ]);

        $nombre = $validatedData['Nombre'] ?? null;
        $apellidoPaterno = $validatedData['ApellidoPaterno'] ?? null;
        $apellidoMaterno = $validatedData['ApellidoMaterno'] ?? null;

        // Búsqueda condicional con paginación
        $pacientesbuscado = Patient::query()
            ->when($nombre, function ($query, $nombre) {
                return $query->where('name', 'like', "%{$nombre}%");
            })
            ->when($apellidoPaterno, function ($query, $apellidoPaterno) {
                return $query->where('apellido_paterno', 'like', "%{$apellidoPaterno}%");
            })
            ->when($apellidoMaterno, function ($query, $apellidoMaterno) {
                return $query->where('apellido_materno', 'like', "%{$apellidoMaterno}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Si no hay búsqueda, obtener todos los pacientes
        if ($pacientesbuscado->isEmpty()) {
            $pacientes = Patient::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $pacientes = $pacientesbuscado;
        }

        // return response()->json($pacientes);
        return view('vistas.pacientes', compact('pacientes', 'path', 'current_page', 'rol'));
    }

    public function estudiosPendientes(Request $request){
        $rol = $request->user()->role->name;

        $path = $request->path();

               $userId = Auth::id();
        $vendorId = DB::table('vendors')
            ->where('id_usuario', $userId)
            ->value('id');
        
            // $totalPruebasPendientes = DB::table('proceso_muestras')
            // ->where('venta_id', $ventasid)
            // ->where('proceso_muestras.estado', '!=', 'completado')
            // ->count();
           // Obtener el total de pruebas pendientes
           $ids = DB::table('proceso_muestras')
                ->join('ventas', 'proceso_muestras.venta_id', '=', 'ventas.id')
               ->where('ventas.vendor_id', $vendorId)
                ->where('proceso_muestras.estado', '!=', 'completado')
                ->pluck('ventas.Patient_id');


                $pacientes = DB::table('patients')
                ->whereIn('id', $ids)
                ->get();

           


    

       return view('vistas.estudiosPendientes', ['rol' => $rol,'path' => $path,'pacientes' => $pacientes]);

      // return response()->json( $pacientes);
    }

    public function show(request $request, $id)
    {
        $path = $request->path();
        $paciente = Patient::find($id);
        $aseguradora = Insurance::find($paciente->insurance_id);
        $doctor = Doctor::find($paciente->doctor_id);
        $direccion = Address::where('patient_id', $paciente->id)->first();
        $responsable = Guardian::where('patient_id', $paciente->id)->first();
        return view('vistas.ver-paciente', ['path' => $path, 'paciente' => $paciente, 'aseguradora' => $aseguradora, 'doctor' => $doctor, 'direccion' => $direccion, 'responsable' => $responsable]);
    }

    public function create(request $request)
    {
        $path = $request->path();
        $aseguradoras = Insurance::all();
        $doctores = Doctor::all();
        return view('vistas.agregar-paciente', ['path' => $path, 'aseguradoras' => $aseguradoras, 'doctores' => $doctores]);
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
            'descripcion_medica' => 'required',
        ]);

        $ultimopaciente = Patient::latest()->first(); // se hace una consulta a patient y se ordena decendentemente y se toma al primero
        //uso de operacion ternaria
        //donde se compara, si el ultimo paciente es null significa que no hay pacientes y se guarda el valor de 0 en ultimo id
        //si hay minimo un paciente es true y con el metodo se obtiene solo despues de el quinto caracteres("NOMAD0000") 
        $ultimoId = $ultimopaciente ? intval(substr($ultimopaciente->id, 5)) : 0;

        // en esta funcion se toma el id del ultimo usuario y se le suma uno y se ponen 3 ceros a la derecha gracias a la funcion str_pad_left
        $nomenclatura = 'NOMAD' . str_pad($ultimoId + 1, 4, '0', STR_PAD_LEFT);

        Patient::create([
            'id' => $nomenclatura,
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
            'id_usuario' => Auth::id(),
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
        return view('vistas.editar-paciente', ['path' => $path, 'paciente' => $paciente, 'aseguradoras' => $aseguradoras, 'doctores' => $doctores]);
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


   

}