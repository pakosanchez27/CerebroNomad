<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaFinanzasController extends Controller
{
    function index(Request $request){
        $path = $request->path();
        return view('vistas.finanzas' , ['path' => $path]);
    }
}
