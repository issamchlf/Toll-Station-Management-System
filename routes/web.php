<?php

use App\Models\Station;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('home');
});
Route::get('station.index', [StationController::class, 'index'])->name('station.index');
Route::get('station.show', [StationController::class, 'show'])->name('station.show');

Route::get('vehicle.index', [VehicleController::class, 'index'])->name('vehicle.index');
Route::get('vehicle.show', [VehicleController::class, 'show'])->name('vehicle.show');


