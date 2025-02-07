@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <div class="mt-4 text-left">
        <a href="/" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Back
        </a>
    </div>
    <h1 class="text-3xl font-bold mb-4">Toll Stations</h1>
    <div class="mb-4">
        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Station
        </a>
    </div>
    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black text-left">ID</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black text-left">Name</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black text-left">City</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black text-left">Total Collected Fee</th>
                    <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-black text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stations as $station)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-left">{{ $station->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-left">{{ $station->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-left">{{ $station->city }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-black text-left">{{ $station->total_collected_fee }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-left">
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
