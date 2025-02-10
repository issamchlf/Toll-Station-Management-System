<?php

namespace App\Http\Controllers\Api;

use App\Models\Station;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return response()->json($vehicles); 
    }

    /**
     * Show the form for creating a new resource.
     */
    //public function create()
    //{
        //
    //}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'license_plate' => 'required',
            'brand' => 'required',
            'vehicle_type' => 'required|in:car,motorcycle,truck',
            'axles' => 'required|numeric',
            'total_fee_paid' => 'required|numeric',
        ]);

        $vehicle = Vehicle::create($validatedData);
        return response()->json($vehicle, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json($vehicle, 200); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(string $id)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }
        $validatedData = $request->validate([
            'license_plate' => 'required',
            'brand' => 'required',
            'vehicle_type' => 'required|in:car,motorcycle,truck',
            'axles' => 'required|numeric',
            'total_fee_paid' => 'required|numeric',
        ]);

        $vehicle->update($validatedData);
        return response()->json($vehicle, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }
        $vehicle->delete();
        return response()->json(['message' => 'Vehicle deleted'], 200); 
    
    }
        public function passStation(string $vehicle_id, string $station_id)
        {
            $vehicle = Vehicle::findOrFail($vehicle_id);
            $station = Station::findOrFail($station_id);
    
            $fee = $vehicle->calculateFee();
    
            DB::table('station_vehicle')->insert([
                'station_id' => $station->id,
                'vehicle_id' => $vehicle->id,
                'fee' => $fee,
                'description' => "Toll charged from vehicle {$vehicle->license_plate}",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            $station->increment('total_collected_fee', $fee);
            $vehicle->increment('total_fee_paid', $fee);
    
            return response()->json([
                'message' => "Vehicle {$vehicle->license_plate} pay {$fee} in the station {$station->name}",
                'total_collected' => $station->total_collected_fee
            ], 200);
        }

    

    public function getVehiclesByStation($station_id)
    {
        $station = Station::findOrFail($station_id);
        $vehicles = $station->vehicles()->get();

        return response()->json($vehicles, 200);
    }

    public function getTotalCollected($station_id)
    {
        $station = Station::findOrFail($station_id);
        return response()->json([
            'station' => $station->name,
            'total_collected_fee' => $station->total_collected_fee
        ], 200);
    }
    public function assignRandomVehiclesToStations()
{
    $stations = Station::all();
    $vehicles = Vehicle::all();

    foreach ($stations as $station) {
        $randomVehicles = $vehicles->random(rand(1, 5));

        foreach ($randomVehicles as $vehicle) {
            $fee = $vehicle->calculateFee();

            if (!$station->vehicles->contains($vehicle->id)) {
                $station->vehicles()->attach($vehicle->id, [
                    'fee' => $fee,
                    'description' => "Toll collected at {$station->name} from vehicle {$vehicle->license_plate}",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $station->increment('total_collected_fee', $fee);
                $vehicle->increment('total_fee_paid', $fee);
            }
        }
    }

    return view('stations', [
        'stations' => Station::with('vehicles')->get(),
        'total_collected_fees' => Station::sum('total_collected_fee')
    ]);
}

    
}
