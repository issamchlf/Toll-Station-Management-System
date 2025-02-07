@extends('layouts.app')

@section('content')
<div class="  flex items-center justify-center">
  <div class=" bg-white p-10 rounded-xl shadow-xl text-center">
    <h1 class="text-5xl font-extrabold text-gray-900 mb-6">Welcome to the Toll Station Management System</h1>
    <p class="text-lg text-gray-700 mb-8">
      Our system helps manage toll stations efficiently by tracking vehicles and managing toll collections seamlessly.
    </p>
    <div class="flex justify-center space-x-4 mb-8">
      <a href="/stations" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
        Stations
      </a>
      <a href="/vehicles" class="bg-gray-600 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
        Vehicles
      </a>
    </div>
    <div class="bg-gray-50 p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Features</h2>
      <ul class="list-disc list-inside text-left text-gray-700">
        <li>Real-time vehicle tracking</li>
        <li>Automated toll collection</li>
        <li>Detailed reporting and analytics</li>
        <li>User-friendly interface</li>
      </ul>
    </div>
  </div>
</div>
@endsection
