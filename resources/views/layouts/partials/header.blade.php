<header>
    <nav class="navbar">
        <div class="hamburger" id="hamburger">
            <span class="hamburger-icon">☰</span>
        </div>
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logoChatGpt.png') }}" alt="Logo" class="logo">
            </a>
        </div>

        <!-- Enlaces de navegación -->
        <ul class="nav-links" id="nav-links">
            <li><a href="{{ url('/') }}" class="active-link"><img src="{{ asset('assets/images/home.png') }}"
                        alt="icono-home">PORTADA</a></li>
            <li><a href="{{ url('guest/club') }}" class="active-link"><img src="{{ asset('assets/images/padel2.png') }}"
                        alt="icono-club">CLUB</a></li>
            <li><a href="{{ url('guest/cursos') }}"><img src="{{ asset('assets/images/cursosIcon.webp') }}"
                        alt="icono-cursos">CURSOS</a></li>
            <!-- Verifica si el usuario está autenticado -->
            @if(Auth::check())
                <li><a href="{{ url('/user/reservas') }}"><img src="{{ asset('assets/images/calendario2.png') }}" alt="icono-calendario">RESERVAS</a></li>
                <li><a href="{{ url('/user/usuario') }}"><img src="{{ asset('assets/images/usuario2.png') }}" alt="icono-usuario">USUARIO</a></li>
            @endif
        </ul>
        <div class="user-info">
            <p>Bienvenidx!</p>
            <span><b>{{ Auth::check() ? Auth::user()->nombre : '' }}</b></span>

            <!-- Verifica si el usuario está autenticado -->
            @if (Auth::check())
                <!-- Logout como enlace con JavaScript -->
                <a href="#" id="logoutLink" class="logout" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    Logout <i class="fa-solid fa-power-off"></i>
                </a>
                <!-- Formulario de logout (oculto, será enviado con el enlace) -->
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ url('guest/login') }}">Login <i class="fa-solid fa-power-off"></i></a>
            @endif
        </div>
    </nav>
</header>
