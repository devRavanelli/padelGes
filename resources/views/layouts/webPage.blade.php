<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'PRV - Pádel Resort Valencia')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/indexMed.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/indexBig.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('assets/images/logoChatGpt.png') }}" type="image/png">
    @yield('styles') <!-- Para CSS específicos de cada vista -->
</head>

<body>
    <div class="background-image"></div>

    <!-- Header -->
    @include('layouts.partials.header')

    <main>
        @yield('content') <!-- Aquí se insertará el contenido específico de cada página -->
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    @yield('scripts') <!-- Para JS específicos de cada vista -->
</body>

</html>
