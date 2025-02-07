<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
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
}
