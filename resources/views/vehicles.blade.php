@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="mt-4 text-left">
        <a href="/" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Back
        </a>
    </div>
    <h1 class="text-3xl font-bold mb-4 text-black text-center">Vehicles</h1>
    <div class="mb-4 flex justify-start">
        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Vehicle
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">ID</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">License Plate</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">Brand</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">Vehicle Type</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">Axles</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">Total Fee Paid</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-center">{{ $vehicle->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-center">{{ $vehicle->license_plate }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-center">{{ $vehicle->brand }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-center">{{ $vehicle->vehicle_type }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-center">{{ $vehicle->axles }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-center">{{ $vehicle->total_fee_paid }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-center">
                            <a href="" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                Edit
                            </a>
                            <form action="" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection