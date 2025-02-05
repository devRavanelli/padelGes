@extends('layouts.webPage')

@section('title', 'Cursos - Pádel Resort Valencia')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/cursos.css') }}" type="text/css">
@endsection

@section('content')



    <div class="background-image"></div>

    <!-- Header -->


    <!-- Main -->

        <!-- Imagen principal -->
        <img src="{{ asset('assets/images/logoChatGpt.png') }}" alt="logo" class="club-imagen">
        <h3>CURSOS</h3>

        <!-- Sección principal -->
        <section class="overlay-section">
            <h1>Conviertete en un profesional!</h1>
            <hr>
            <p>Cursos individuales por niveles</p>
            <p>
                En Pádel Resort Valencia, nos enorgullece ofrecer clases personalizadas de pádel diseñadas para adaptarse a
                cada nivel de habilidad, desde principiantes hasta jugadores avanzados. Entendemos que cada persona tiene
                sus propias necesidades y metas, por lo que nuestras clases están completamente personalizadas para asegurar
                un aprendizaje eficaz y divertido. Nuestros entrenadores altamente cualificados trabajan de cerca con cada
                jugador, creando programas de entrenamiento individuales que se enfocan en el desarrollo técnico, táctico y
                físico necesario para mejorar en la pista.<br><br>
                Además, en Pádel Resort Valencia nos aseguramos de que cada clase no solo sea una oportunidad para mejorar,
                sino también para disfrutar del deporte y construir una mentalidad ganadora. Ya sea que busques perfeccionar
                tu técnica, mejorar tu juego en pareja o simplemente disfrutar de una experiencia única, nuestras clases se
                ajustan a tus necesidades y te proporcionan el apoyo necesario para alcanzar tus objetivos. Con un enfoque
                en la progresión continua y el trabajo personalizado, nuestras clases de pádel están diseñadas para hacer
                que cada jugador dé lo mejor de sí, maximizando su potencial.
            </p>
        </section>

        <!-- Sección de Nuestros Instructores -->
        <section class="instructores-section">
            <h2>Nuestros Instructores</h2>
            <div class="instructores-container">
                <!-- Instructor 1 -->
                <div class="instructor">
                    <img src="{{ asset('assets/images/tapia.png') }}" alt="Instructor 1">
                    <h4>Alberto Beltrán</h4>
                    <p>Alberto es un entrenador con más de 10 años de experiencia en el pádel, especializado en la técnica y
                        estrategia de juego.</p>
                </div>

                <!-- Instructor 2 -->
                <div class="instructor">
                    <img src="{{ asset('assets/images/galan.png') }}" alt="Instructor 2">
                    <h4>Pedro Motos</h4>
                    <p>Pedro tiene una amplia formación en técnicas de entrenamiento y es conocida por su enfoque motivador
                        y cercano con los jugadores.</p>
                </div>

                <!-- Instructor 3 -->
                <div class="instructor">

                    <img src="{{ asset('assets/images/chingotto.png') }}" alt="Instructor 3">
                    <h4>José M. Catalá</h4>
                    <p>Chema es un experto en tácticas avanzadas de pádel, trabajando con jugadores de nivel intermedio y
                        alto.</p>
                </div>

                <!-- Instructor 4 -->
                <div class="instructor">

                    <img src="{{ asset('assets/images/bea.png') }}" alt="Instructor 4">
                    <h4>Ana Martín</h4>
                    <p>Ana es una entrenadora que se especializa en el desarrollo de habilidades técnicas y físicas,
                        adaptándose a todos los niveles.</p>
                </div>
            </div>
        </section>




@endsection
<!-- Footer -->


<!-- Scripts -->




</html>
