<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargaMasivaController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $path = $request->path();
        return view('vistas.carga-masiva' , ['path' => $path]);
    }
}
