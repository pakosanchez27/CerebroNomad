<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VistaAseguradorasController;
use App\Http\Controllers\VistaRolesController;
use App\Http\Controllers\VistaDoctoresController;
use App\Http\Controllers\VistaFinanzasController;
use App\Http\Controllers\VistaPacienteController;
use App\Http\Controllers\VistaPruebasController;
use App\Http\Controllers\VistaVendedoresController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login'); // login page  
Route::post('/login', [LoginController::class, 'store']); // login page  


Route::get('/cambiar-contraseña', [ChangePasswordController::class, 'index'])->name('cambiar-contraseña');
Route::put('/cambiar-contraseña/{id}', [ChangePasswordController::class, 'update'])->name('actualizar-contraseña');

//Dashboard

Route::get('/home',[HomeController::class, 'index'])->name('home'); //dashboard page
Route::get('/pacientes',[VistaPacienteController::class, 'index'])->name('pacientes'); //pacientes page

//Roles
Route::get('/roles', [VistaRolesController::class, 'index'])->name('roles'); //roles page
Route::get('/roles/{colaborador}', [VistaRolesController::class, 'edit'])->name('roles.edit'); //roles page
Route::put('/roles/{colaborador}', [VistaRolesController::class, 'update'])->name('roles.update'); //roles page
Route::delete('/roles/{colaborador}', [VistaRolesController::class, 'destroy'])->name('roles.destroy'); //roles page
Route::post('/roles', [VistaRolesController::class, 'store'])->name('roles.store'); //roles page 


Route::get('/finanzas', [VistaFinanzasController::class, 'index'])->name('finanzas'); //finanzas page
Route::get('/vendedores',[VistaVendedoresController::class, 'index'])->name('vendedores'); //vendedores page
Route::get('/doctores',[VistaDoctoresController::class, 'index'])->name('doctores'); //doctores page
Route::get('/pruebas', [VistaPruebasController::class, 'index'])->name('pruebas'); //pruebas page
Route::get('/aseguradoras', [VistaAseguradorasController::class, 'index'])->name('aseguradoras'); //aseguradoras page
