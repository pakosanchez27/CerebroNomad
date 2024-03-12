<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaDoctoresController extends Controller
{
    function index(Request $request){
        $path = $request->path();
        return view('vistas.doctores' , ['path' => $path]);
    }
}
