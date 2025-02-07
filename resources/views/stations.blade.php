@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="/" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300">
            Back
        </a>
    </div>

    <h1 class="text-4xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
        Toll Stations
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($stations as $station)
            <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-indigo-500 hover:scale-105 transition-transform duration-300">
                <h2 class="text-2xl font-bold text-indigo-700">{{ $station->name }}</h2>
                <p class="text-gray-700 mt-2"><strong>City:</strong> {{ $station->city }}</p>
                <p class="text-gray-700 mt-1"><strong>Total Collected Fee:</strong> ${{ $station->total_collected_fee }}</p>
                
                <h3 class="text-xl font-semibold mt-4 text-gray-800">Passed Vehicles:</h3>
                <ul class="mt-2 space-y-4">
                    @foreach($station->vehicles as $vehicle)
                        <li class="bg-gradient-to-r from-blue-100 to-blue-50 p-4 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <h4 class="text-lg font-bold text-blue-700">{{ $vehicle->license_plate }}</h4>
                                <span class="text-sm bg-blue-200 text-blue-800 px-2 py-1 rounded-full">
                                    ${{ $vehicle->calculateFee() }}
                                </span>
                            </div>
                            <p class="mt-1 text-gray-600"><strong>Brand:</strong> {{ $vehicle->brand }}</p>
                            <p class="mt-1 text-gray-600"><strong>Type:</strong> {{ $vehicle->vehicle_type }}</p>
                            <p class="mt-1 text-gray-600"><strong>Description:</strong> Toll charged from vehicle {{ $vehicle->license_plate }}</p>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    <a href="{{ route('stations.show', $station->id) }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300">
                        Show
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
