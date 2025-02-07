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

    public function show(Station $station)
    {
        //
    }
    public function registerToll(Request $request){
        $request->validate([
            'license_plate' => 'required',
            'vehicle_type' => 'required|in:car,motorcycle,truck',
            'station_id' => 'required|exists:stations,id',
            'axles' => 'nullable|integer' 
       ]);
       $vehicle = Vehicle::firstOrCreate(['license_plate' => $request->license_plate], [
        'vehicle_type' => $request->vehicle_type,
    ]);
    $station = Station::find($request->station_id);
    $station->vehicles()->attach($vehicle->id, ['axles' => $request->axles]);
    }
}
