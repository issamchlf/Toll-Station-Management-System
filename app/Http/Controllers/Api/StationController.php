<?php

namespace App\Http\Controllers\Api;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stations = Station::all();
        return response()->json($stations);
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
            'name' => 'required',
            'city' => 'required',
            'total_collected_fee' => 'required',
        ]);

        $station = Station::create($validatedData); 
        return response()->json($station, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $station = Station::findOrFail($id);
        return response()->json($station, 200);
    }


    public function update(Request $request, string $id)
    {
        $station = Station::findOrFail($id);
        if (!$station) {
            return response()->json(['message' => 'Station not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'total_collected_fee' => 'required',
        ]);

        $station = Station::findOrFail($id);
        $station->update($validatedData);
        return response()->json($station, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $station = Station::findOrFail($id);
        if (!$station) {
            return response()->json(['message' => 'Station not found'], 404);
        }
        $station->delete();
        return response()->json(['message' => 'Station deleted'], 200); 
    }
}
