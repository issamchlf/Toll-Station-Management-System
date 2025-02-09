<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stations = Station::all();
        return view('stations', compact('stations'));
    }

    public function show($id)
    {
        $station = Station::with('vehicles')->findOrFail($id);
        return view('stations.show', compact('station'));
    }
    
}
