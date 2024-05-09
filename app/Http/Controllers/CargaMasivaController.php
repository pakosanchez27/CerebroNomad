<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
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
      $aseguradoras = Insurance::all();

      (new FastExcel($aseguradoras))->download('file.xlsx');


    }

    public function uploadAseguradoras(Request $request)
    {
        $request->validate([
            'fileAseguradora' => 'required',
        ]);

        $file = $request->file('fileAseguradora');

        $collection = (new FastExcel)->import($file);

        foreach ($collection as $row) {
            Insurance::create([
                'name' => $row['nombre'],
                'representante' => $row['representante'],
                'telefono' => $row['telefono'],
                'email' => $row['email'],

            ]);
        }

        return redirect()->route('carga-masiva.index')->with('success', 'Pacientes cargados correctamente');
    }
}
