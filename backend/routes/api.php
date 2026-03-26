<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Vehicle API resource routes
Route::apiResource('vehicles', VehicleController::class);

// Employee API resource routes
Route::apiResource('employees', EmployeeController::class);
// Reservation API resource routes
Route::apiResource('reservations', ReservationController::class);
// Maintenance API resource routes
Route::apiResource('maintenances', MaintenanceController::class);
// GPS Location API resource routes
Route::apiResource('gps-locations', GpsLocationController::class);