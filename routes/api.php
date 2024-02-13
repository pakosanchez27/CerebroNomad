<?php

use App\Http\Controllers\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\InsuranceController;

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

Route::group(['prefix' => 'v1'], function () {

    Route::apiResource('users', UserController::class);
    Route::apiResource('patients', PatientsController::class);
    Route::apiResource('insurances', InsuranceController::class);
    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('guardians', GuardianController::class);
    Route::apiResource('address', AddressController::class);


});


