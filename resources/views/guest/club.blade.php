@extends('layouts.webPage')

@section('title', 'Club - Pádel Resort Valencia')

@section('styles')
@endsection

@section('content')
    <div class="background-image"></div>
    <img class="club-imagen" src="{{ asset('assets/images/logoChatGpt.png') }}" alt="logo">

    <h3>CLUB</h3>

    <section class="overlay-section">
        <h1>Formando hoy a los campeones del mañana</h1>
        <hr>
        <p>15 años de enseñanza deportiva</p>
        <p>
            Pádel Resort Valencia es un espacio diseñado para ofrecer una experiencia deportiva de excelencia en la práctica
            del pádel en Valencia. Desde su creación, el club se ha comprometido a formar jugadores y entusiastas que
            disfruten plenamente de este deporte mientras desarrollan valores fundamentales como el esfuerzo, la superación
            personal y el trabajo en equipo. En un entorno donde el pádel sigue creciendo y evolucionando, Pádel Resort
            Valencia se adapta a los desafíos actuales, promoviendo la innovación, el entrenamiento técnico de alto nivel,
            el uso de tecnología avanzada y el fortalecimiento de una comunidad deportiva vibrante.<br><br>
            Por ello, formar parte de Pádel Resort Valencia no es solo una decisión deportiva, sino un estilo de vida.
            Nuestro equipo, compuesto por entrenadores expertos y apasionados, se dedica a brindar una formación moderna y
            personalizada que ayuda a nuestros jugadores a alcanzar sus metas dentro y fuera de la pista. Este enfoque se
            refuerza con la colaboración activa entre jugadores, entrenadores y familias, todos trabajando juntos hacia un
            objetivo común… ¡el éxito y la satisfacción de nuestra comunidad deportiva!
        </p>
    </section>

    <section class="extra-content">
        <h2>Cinco razones para elegir Pádel Resort</h2>
        <div class="reasons-container">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="icon"><img src="{{ asset('assets/images/calidad.png') }}" alt="calidad"></i>
                        <p>Calidad</p>
                    </div>
                    <div class="flip-card-back">
                        <h4>Calidad</h4>
                        <p>
                            En Pádel Resort Valencia, la calidad no es solo un estándar, es una filosofía.
                            Ofrecemos entrenamiento técnico de alto nivel respaldado por la última tecnología,
                            lo que garantiza que cada jugador reciba una formación personalizada y efectiva.
                            Nuestros entrenadores están altamente cualificados para identificar el potencial de cada miembro
                            y
                            ayudarles a superarse en cada sesión, fomentando un crecimiento continuo dentro y fuera de la
                            pista.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="icon"><img src="{{ asset('assets/images/comunidad.png') }}" alt="comunidad"></i>
                        <p>Comunidad</p>
                    </div>
                    <div class="flip-card-back">
                        <h4>Comunidad</h4>
                        <p>
                            Formar parte de Pádel Resort Valencia significa unirse a una comunidad vibrante y solidaria
                            donde cada miembro, desde jugadores hasta familias y entrenadores, comparte una pasión común por
                            el deporte.
                            Nuestro club fomenta un ambiente de colaboración, respeto y apoyo mutuo, creando conexiones que
                            trascienden la pista.
                            Aquí, celebramos los logros individuales y colectivos, porque el éxito se construye mejor
                            juntos.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="icon"><img src="{{ asset('assets/images/trofeo.png') }}" alt="exito"></i>
                        <p>Éxito</p>
                    </div>
                    <div class="flip-card-back">
                        <h4>Éxito</h4>
                        <p>
                            En Pádel Resort Valencia, entendemos el éxito como un proceso continuo de superación personal.
                            Más allá de los logros deportivos, nuestro enfoque integral ayuda a cada jugador a alcanzar sus
                            metas tanto dentro como fuera de la pista.
                            A través de una formación personalizada y el apoyo constante de nuestros entrenadores, te
                            ayudamos a desarrollar habilidades, disciplina y mentalidad ganadora,
                            que te preparan para sobresalir en todos los aspectos de la vida. El éxito es el resultado de la
                            dedicación, el esfuerzo y el trabajo en equipo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="icon"><img src="{{ asset('assets/images/formacion.png') }}" alt="formacion"></i>
                        <p>Formación</p>
                    </div>
                    <div class="flip-card-back">
                        <h4>Formación</h4>
                        <p>
                            En Pádel Resort Valencia, la formación es el núcleo de nuestra filosofía.
                            Nuestra metodología moderna y personalizada está diseñada para adaptarse a las necesidades
                            individuales de cada jugador,
                            desde principiantes hasta atletas de alto nivel. Utilizamos técnicas de entrenamiento
                            innovadoras, que combinan lo mejor de la tecnología, el análisis de rendimiento y el enfoque
                            práctico en la pista.
                            Nuestros entrenadores, altamente cualificados, trabajan de cerca con cada jugador para maximizar
                            su potencial,
                            asegurándose de que cada sesión sea productiva y divertida. Aquí, cada paso es un avance hacia
                            la excelencia.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="icon"><img src="{{ asset('assets/images/innovacion.png') }}" alt="innovacion"></i>
                        <p>Innovación</p>
                    </div>
                    <div class="flip-card-back">
                        <h4>Innovación</h4>
                        <p>
                            En Pádel Resort Valencia, la innovación es una de nuestras piedras angulares.
                            Nos esforzamos por estar siempre a la vanguardia del deporte, incorporando nuevas tecnologías,
                            métodos de entrenamiento avanzados y herramientas digitales que optimizan el rendimiento de
                            nuestros jugadores.
                            Desde el análisis de datos en tiempo real hasta el uso de sistemas de monitoreo avanzados,
                            brindamos una experiencia única que permite a nuestros miembros superar sus propios límites.
                            Innovamos no solo en los entrenamientos, sino también en la creación de un ambiente moderno y
                            eficiente
                            que impulsa el desarrollo continuo dentro y fuera de la pista.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="unase-contenedor">
        <h3 id="unase-texto">Visite nuestro club de pádel</h3>
        <p>Si desea obtener más información, desea programar un recorrido o está listo para comenzar el proceso de
            solicitud, haga clic en una de las opciones a continuación.</p>
        <button id="aplicar-btn">APLICAR AHORA</button>
    </div>

    <div id="formulario-popup" class="popup">
        <div class="popup-content">
            <h3>Formulario de Solicitud</h3>
            <form id="formulario-solicitud" method="POST" action="{{ url('php/enviarFormulario.php') }}">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required readonly>

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required readonly>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required readonly>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required readonly>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" readonly>

                <label for="comentarios">Comentarios:</label>
                <textarea id="comentarios" name="comentarios" rows="4"></textarea>

                <div class="form-buttons">
                    <button type="submit">Aceptar</button>
                    <button type="button" id="cancelar-btn">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/formularioClub.js') }}"></script>
@endsection
