<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'Panel de Administrador')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logoChatGpt.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminPanel.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <header class="header">
        <!-- Botón para abrir/cerrar el menú en móviles -->
        <span class="menu-toggle" onclick="toggleSidebar()">☰</span>
        <img src="{{ asset('assets/images/logoChatGpt.png') }}" alt="Logo" class="logo">
        <h1><i class="fas fa-key"></i>Administrador</h1>
        <div class="user-info">
            <p>Bienvenidx!</p>
            <span><b>{{ Auth::check() ? Auth::user()->nombre : '' }}</b></span>

            <!-- Verifica si el usuario está autenticado -->
            @if (Auth::check())
                <!-- Formulario de logout -->
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        Logout <i class="fa-solid fa-power-off"></i>
                    </button>
                </form>
            @else
                <a href="{{ url('guest/login') }}">Login<i class="fa-solid fa-power-off"></i></a>
            @endif
        </div>
    </header>

    <nav class="sidebar" id="sidebar">
        <ul>
            <li>
                <a id="link-usuarios" href="{{ route('admin.usuarios.mostrar') }}">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </li>
            <li>
                <a id="link-reservas" href="{{ route('admin.reservas.mostrar') }}">
                    <i class="fas fa-calendar-check"></i> Reservas
                </a>
            </li>
            <li>
                <a id="link-settings" href="{{ route('admin.settings') }}">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
    </nav>


    <main class="main-container">
        <!-- Aquí se incluirá el contenido de las vistas -->
        @yield('content')
    </main>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('js/adminPanel.js') }}"></script>
</body>

</html>
