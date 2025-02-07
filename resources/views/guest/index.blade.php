@extends('layouts.webPage')

@section('title', 'Portada - Pádel Resort Valencia')

@section('styles')

@endsection

@section('content')
        <video autoplay loop muted playsinline class="main-video">
            <source src="{{ asset('assets/videos/paddleIntroM.mp4') }}" alt="Logo" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
        </video>
        <!-- Contenedor de Noticias -->
        <div class="noticias-container">
            <div class="noticias-titulo">
                <span>NOTICIAS</span>
            </div>
            <div class="noticias-slider">
                <div class="slider-items">
                    <div class="slider-item">Nuevas pistas de cristal </div>
                    <div class="slider-item">La dana en Valencia </div>
                    <div class="slider-item">World paddle tour </div>
                </div>
                <!-- Contenedor de los botones de navegación -->
                <div class="slider-buttons">
                    <button class="slider-prev">&lt;</button>
                    <button class="slider-next">&gt;</button>
                </div>
            </div>
        </div>
        <section class="seccion-portada">
            <h1>Pádel Resort Valencia</h1>
            <hr>

            <p>
                "Paddle Club Valencia fomenta el desarrollo de jugadores en un entorno dinámico, inclusivo y
                colaborativo, donde cada miembro es impulsado a superarse, disfrutar del deporte y seguir creciendo
                tanto dentro como fuera de la pista."
            </p>
        </section>
        <section class="seccion-cifras">

            <h1>PRV en cifras</h1>
            <hr>
            <div class="contenedor-seccion-cifras">
                <div class="contenedor-cifras">
                    <img src="{{ asset('assets/images/usuariosTotales.webp') }}" alt="usuariosTotales">
                    <h2 class="total-usuarios">{{ $totalUsuarios }}</h2>
                    <p>Usuarios totales</p>
                </div>
                <div class="contenedor-cifras">
                    <img src="{{ asset('assets/images/cancha.png') }}" alt="cancha">
                    <h2 class="total-usuarios">{{ $totalPistas }}</h2>
                    <p>Pistas</p>
                </div>
                <div class="contenedor-cifras">
                    <img src="{{ asset('assets/images/instalaciones.png') }}" alt="instalaciones">
                    <h2 class="total-usuarios">5,000 m2</h2>
                    <p>Instalaciones</p>
                </div>
            </div>
        </section>
        @endsection

    <!-- Footer -->






    <script src="{{ secure_asset('js/sliderNoticias.js') }}"></script>

    <script src="{{ secure_asset('js/cifras.js') }}"></script>


</html>
