<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        
        $path = $request->path(); // Obtener la parte de la URL después del dominio
        
        return view('vistas/home' , ['path' => $path]);
    }
}
