<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index($id_rol)
    {
        if(!$id_rol == 'all'){
            $users = User::where('rol_id', $id_rol)->get();
        }else{
            $users = User::all();
        }
       
        return response()->json(['data' => $users], 200);
    }
}
