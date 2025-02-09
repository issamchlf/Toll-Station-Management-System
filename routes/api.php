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

Route::get('/station/{id}/vehicles', [VehicleController::class, 'getVehiclesByStation'])->name('getVehiclesByStation');
Route::get('/station/{id}/total-collected', [VehicleController::class, 'getTotalCollected'])->name('getTotalCollected');
Route::post("/vehicles/{id}/stations/{stationId}", [VehicleController::class, "passStation"])->name("apipassStation");
Route::post('/assign-random-vehicles', [VehicleController::class, 'assignRandomVehiclesToStations'])->name('assignRandomVehiclesToStations');


Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicleIndex');  
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');
Route::put('/vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');
