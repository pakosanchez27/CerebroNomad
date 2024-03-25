<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        
        $path = $request->path(); // Obtener la parte de la URL después del dominio
        $users = User::take(10)->get();
        return view('vistas/home' , ['path' => $path, 'users' => $users]);
    }
}
