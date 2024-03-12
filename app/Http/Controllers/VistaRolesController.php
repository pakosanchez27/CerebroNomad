<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaRolesController extends Controller
{
    function index(Request $request){
        $path = $request->path();
        return view('vistas.roles' , ['path' => $path]);
    }
}
