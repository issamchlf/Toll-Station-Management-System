@extends('layouts.app')

@section('content')
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8">Welcome to the Toll Station Management System</h1>
        <div class="space-x-4">
            <a href="/station" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">Station</a>
            <a href="/vehicle" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition duration-300">Vehicle</a>
        </div>
    </div>
</body>
@endsection
