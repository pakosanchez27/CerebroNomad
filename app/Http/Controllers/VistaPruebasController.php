<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaPruebasController extends Controller
{
    public function index(Request $request){
        $path = $request->path();
        return view('vistas.pruebas' , ['path' => $path]);
    }
}
