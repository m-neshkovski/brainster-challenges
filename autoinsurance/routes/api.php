<?php

use App\Http\Controllers\VehicleApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vehicles', [VehicleApiController::class, 'index']);
Route::post('/vehicles', [VehicleApiController::class, 'store']);
Route::get('/vehicles/{id}', [VehicleApiController::class, 'show']);
Route::patch('/vehicles/{id}', [VehicleApiController::class, 'update']);
Route::delete('/vehicles/{id}', [VehicleApiController::class, 'destroy']);
