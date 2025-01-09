<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Toll System')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden text-white">
    <x-header />

    <main class="flex-grow flex items-center justify-center">
        @yield('content')
    </main>

    <x-footer />
</body>


</html>
