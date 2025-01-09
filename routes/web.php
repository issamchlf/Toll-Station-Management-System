<?php

use App\Http\Controllers\StationController;
use App\Models\Station;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('station.index', [StationController::class, 'index'])->name('station.index');

