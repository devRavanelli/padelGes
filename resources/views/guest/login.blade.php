<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>PRV - Pádel Resort Valencia</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
    <link rel="icon" href="./assets/logoChatGpt.png" type="image/x-icon">
</head>

<body>
    <div class="main-container">
        <div class="login-container">
            <img src="{{ asset('assets/images/logoChatGpt.png') }}" alt="Logo" class="login-logo">
            <p id="message"></p> <!-- Mensaje de respuesta -->
            <h4>Introduzca su usuario y contraseña</h4>
            <form id="loginForm" method="POST" action=action="{{ route('guest.login') }}">
                @csrf
                <div class="input-container">
                    <input type="text" id="dni" name="dni" required>
                    <label for="dni">DNI</label>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Contraseña</label>
                </div>
                <button type="submit">Iniciar Sesión</button>
            </form>

        </div>
        <footer>Desarrollado por Sammy Odeh @ 2024</footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
<script>
    var loginUrl = "{{ route('guest.login') }}"; // Genera la URL con Blade
</script>
