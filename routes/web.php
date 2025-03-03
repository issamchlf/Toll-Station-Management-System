<?php

use App\Models\Station;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('home');
});
Route::get('stations', [StationController::class, 'index'])->name('stations');
Route::get('/stations/{station}', [StationController::class, 'show'])->name('stations.show');

Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');



