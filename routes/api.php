<?php

use App\Http\Controllers\PatientsController;
use App\Http\Controllers\RolsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/rols', [RolsController::class, 'index']);

    Route::get('/users/{rol_id}', [UserController::class, 'index']);
    Route::get('/patients/', [PatientsController::class, 'index']);
    Route::get('/patients/{doctors_id}', [PatientsController::class, 'index']);
  
});

