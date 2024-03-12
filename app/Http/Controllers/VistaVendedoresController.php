<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaVendedoresController extends Controller
{
    function index(Request $request){
        $path = $request->path();
        return view('vistas.vendedores' , ['path' => $path]);
    }
}
