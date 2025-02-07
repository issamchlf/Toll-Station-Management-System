<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StationController;
use App\Http\Controllers\Api\VehicleController;

Route::get('/station', [StationController::class, 'index'])->name('station.index');
Route::post('/station', [StationController::class, 'store'])->name('station.store');
Route::get('/station/{id}', [StationController::class, 'show'])->name('station.show');
Route::put('/station/{id}', [StationController::class, 'update'])->name('station.update');
Route::delete('/station/{id}', [StationController::class, 'destroy'])->name('station.destroy');

Route::get('/station/{id}/vehicles', [StationController::class, 'vehicles'])->name('station.vehicles');
Route::post('/station/{id}/vehicles', [StationController::class, 'registerVehicle'])->name('station.registerVehicle');
Route::post('/station/{id}/toll', [StationController::class, 'registerToll'])->name('station.registerToll');


Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle.index');  
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');
Route::put('/vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');
