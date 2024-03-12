<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaPacienteController extends Controller
{
    public function index(request $request)
    {
        $path = $request->path();
        return view('vistas/pacientes', ['path' => $path]);
    }
}
