@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-blue-200 via-purple-200 to-pink-200 flex items-center">
    <div class="w-full px-4 py-8">
        <div class="flex justify-between items-center mb-8 px-8">
            <a href="/stations" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded shadow-md transition duration-300">
                &larr; Back to Stations
            </a>
            <h1 class="text-4xl font-extrabold text-white drop-shadow-lg">{{ $station->name }}</h1>
        </div>
        <div class="bg-white bg-opacity-90 rounded-xl shadow-xl p-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <p class="text-lg text-gray-800"><strong>City:</strong> <span class="ml-2">{{ $station->city }}</span></p>
                <p class="text-lg text-gray-800"><strong>Total Collected Fee:</strong> <span class="ml-2">$ {{ $station->total_collected_fee }}</span></p>
            </div>
            <div class="mt-8">
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Passed Vehicles</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($station->vehicles as $vehicle)
                        <div class="bg-blue-500 rounded-lg p-6 shadow hover:shadow-lg transition duration-300">
                            <div class="flex justify-between items-center">
                                <h4 class="text-xl font-semibold text-indigo-600">{{ $vehicle->license_plate }}</h4>
                                <span class="bg-indigo-600 text-white rounded-full px-4 py-1 text-sm font-bold">
                                    ${{ $vehicle->pivot->fee ?? 'N/A' }}
                                </span>
                            </div>
                            <p class="text-gray-700 mt-2"><strong>Brand:</strong> {{ $vehicle->brand }}</p>
                            <p class="text-gray-600 mt-1"><strong>Description:</strong> {{ $vehicle->pivot->description }}</p>
                            <p class="text-gray-600 mt-1"><strong>Type:</strong> {{ $vehicle->vehicle_type }}</p>
                            <p class="text-gray-600 mt-1"><strong>Axles:</strong> {{ $vehicle->axles }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
