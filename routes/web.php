<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\VistaRolesController;
use App\Http\Controllers\VistaPruebasController;
use App\Http\Controllers\VistaDoctoresController;
use App\Http\Controllers\VistaFinanzasController;
use App\Http\Controllers\VistaPacienteController;
use App\Http\Controllers\VistaGuardiansController;
use App\Http\Controllers\VistaVendedoresController;
use App\Http\Controllers\VistaDireccionesController;
use App\Http\Controllers\VistaAseguradorasController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\ProcesoMuetrasController;

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
Route::post('/verificar-token', [LoginController::class, 'verificarToken'])->name('verificar-token'); // login page
Route::get('/reenviar-token', [LoginController::class, 'reenviarToken'])->name('reenviarToken'); // login page

Route::post('/logout', [logoutController::class, 'logout'], '')->name('logout');


Route::get('/cambiar-contraseña', [ChangePasswordController::class, 'index'])->name('cambiar-contraseña');
Route::put('/cambiar-contraseña/{id}', [ChangePasswordController::class, 'update'])->name('actualizar-contraseña');

//Dashboard

Route::get('/home',[HomeController::class, 'index'])->name('home'); //dashboard page

Route::get('/pacientes',[VistaPacienteController::class, 'index'])->name('pacientes'); //pacientes page
Route::get('/pacientes/crear', [VistaPacienteController::class, 'create'])->name('pacientes.create'); //pacientes page
Route::get('/pacientes/{id}', [VistaPacienteController::class, 'show'])->name('pacientes.show'); //pacientes page

Route::post('/pacientes/crear', [VistaPacienteController::class, 'store'])->name('pacientes.store'); //pacientes page
Route::get('/pacientes/editar/{id}', [VistaPacienteController::class, 'edit'])->name('pacientes.edit'); //pacientes page
Route::put('/pacientes/editar/{id}', [VistaPacienteController::class, 'update'])->name('pacientes.update'); //pacientes page
Route::delete('/pacientes/{id}', [VistaPacienteController::class, 'destroy'])->name('pacientes.destroy'); //pacientes page)


//Roles

Route::get('/roles', [VistaRolesController::class, 'index'])->name('roles'); //roles page
Route::get('/roles/{colaborador}', [VistaRolesController::class, 'edit'])->name('roles.edit'); //roles page
Route::put('/roles/{colaborador}', [VistaRolesController::class, 'update'])->name('roles.update'); //roles page
Route::delete('/roles/{colaborador}', [VistaRolesController::class, 'destroy'])->name('roles.destroy'); //roles page
Route::post('/roles', [VistaRolesController::class, 'store'])->name('roles.store'); //roles page
Route::put('/roles/resetPassword/{colaborador}', [VistaRolesController::class, 'resetPassword'])->name('roles.resetPassword'); //roles page


Route::get('/finanzas', [VistaFinanzasController::class, 'index'])->name('finanzas'); //finanzas page

Route::get('/vendedores',[VistaVendedoresController::class, 'index'])->name('vendedores'); //vendedores page
Route::get('/vendedores/crear', [VistaVendedoresController::class, 'create'])->name('vendedores.create'); //vendedores page
Route::post('/vendedores/crear', [VistaVendedoresController::class, 'store'])->name('vendedores.store'); //vendedores page
Route::get('/vendedores/editar/{id}', [VistaVendedoresController::class, 'edit'])->name('vendedores.edit'); //vendedores page
Route::put('/vendedores/editar/{id}', [VistaVendedoresController::class, 'update'])->name('vendedores.update'); //vendedores page
Route::delete('/vendedores/{id}', [VistaVendedoresController::class, 'destroy'])->name('vendedores.destroy'); //vendedores page


Route::get('/doctores',[VistaDoctoresController::class, 'index'])->name('doctores'); //doctores page
Route::get('/doctores/crear', [VistaDoctoresController::class, 'create'])->name('doctores.create'); //doctores page
Route::post('/doctores/crear', [VistaDoctoresController::class, 'store'])->name('doctores.store'); //doctores page
Route::get('/doctores/{id}', [VistaDoctoresController::class, 'show'])->name('doctores.show'); //doctores page
Route::get('/doctores/editar/{id}', [VistaDoctoresController::class, 'edit'])->name('doctores.edit'); //doctores page
Route::put('/doctores/editar/{id}', [VistaDoctoresController::class, 'update'])->name('doctores.update'); //doctores page
Route::delete('/doctores/{id}', [VistaDoctoresController::class, 'destroy'])->name('doctores.destroy'); //doctores page


Route::get('/pruebas', [VistaPruebasController::class, 'index'])->name('pruebas'); //pruebas page
Route::get('/pruebas/crear', [VistaPruebasController::class, 'create'])->name('pruebas.create'); //pruebas page
Route::post('/pruebas/crear', [VistaPruebasController::class, 'store'])->name('pruebas.store'); //pruebas page
Route::get('/pruebas/editar/{id}', [VistaPruebasController::class, 'edit'])->name('pruebas.edit'); //pruebas page
Route::put('/pruebas/editar/{id}', [VistaPruebasController::class, 'update'])->name('pruebas.update'); //pruebas page
Route::delete('/pruebas/{id}', [VistaPruebasController::class, 'destroy'])->name('pruebas.destroy'); //pruebas page


Route::get('/aseguradoras', [VistaAseguradorasController::class, 'index'])->name('aseguradoras'); //aseguradoras page
Route::get('/aseguradoras/agregar', [VistaAseguradorasController::class, 'create'])->name('aseguradoras.create'); //aseguradoras page
Route::post('/aseguradoras/agregar', [VistaAseguradorasController::class, 'store'])->name('aseguradoras.store'); //aseguradoras page
Route::get('/aseguradoras/editar/{id}', [VistaAseguradorasController::class, 'edit'])->name('aseguradoras.edit'); //aseguradoras page
Route::put('/aseguradoras/editar/{id}', [VistaAseguradorasController::class, 'update'])->name('aseguradoras.update'); //aseguradoras page
Route::delete('/aseguradoras/{id}', [VistaAseguradorasController::class, 'destroy'])->name('aseguradoras.destroy'); //aseguradoras page


// Direcciones

Route::post('/direcciones', [VistaDireccionesController::class, 'store'])->name('direcciones.store'); //pacientes page
Route::put('/direcciones/editar/{id}', [VistaDireccionesController::class, 'update'])->name('direcciones.update'); //pacientes page


// Guardian
Route::post('/guardianes', [VistaGuardiansController::class, 'store'])->name('guardianes.store'); //pacientes page
Route::put('/guardianes/editar/{id}', [VistaGuardiansController::class, 'update'])->name('guardianes.update'); //pacientes page

// ventas
Route::get('/ventas/crear/{patient_id}', [VentaController::class, 'create'])->name('venta.create'); //ventas page
Route::post('/ventas/crear/{patient_id}', [VentaController::class, 'store'])->name('venta.store'); //ventas page


// verpuebas

Route::get('/pruebas-paciente/{id}', [ProcesoMuetrasController::class, 'show'])->name('pruebas-paciente'); //pruebas page
