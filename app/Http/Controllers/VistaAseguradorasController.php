<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaAseguradorasController extends Controller
{
    function index(Request $request){
        $path = $request->path();
        return view('vistas.aseguradoras' , ['path' => $path]);
    }
}
