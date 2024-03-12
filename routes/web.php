<?php

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


//Dashboard

Route::get('/home',[HomeController::class, 'index'])->name('home'); //dashboard page
Route::get('/pacientes',[VistaPacienteController::class, 'index'])->name('pacientes'); //pacientes page
Route::get('/roles', [VistaRolesController::class, 'index'])->name('roles'); //roles page
Route::get('/finanzas', [VistaFinanzasController::class, 'index'])->name('finanzas'); //finanzas page
Route::get('/vendedores',[VistaVendedoresController::class, 'index'])->name('vendedores'); //vendedores page
Route::get('/doctores',[VistaDoctoresController::class, 'index'])->name('doctores'); //doctores page
Route::get('/pruebas', [VistaPruebasController::class, 'index'])->name('pruebas'); //pruebas page
Route::get('/aseguradoras', [VistaAseguradorasController::class, 'index'])->name('aseguradoras'); //aseguradoras page

