@extends('layouts.webPage')

@section('title', 'Selecciona una fecha - ' . $pista->nombre_pista)


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/calendario.css') }}" type="text/css">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

@section('content')
    <div class="calendario-container">
        <h2>Selecciona una fecha para {{ $pista->nombre_pista }}</h2>

        <input type="text" id="fechaSeleccionada" placeholder="Selecciona una fecha" readonly>
        <button id="verDisponibilidad">Ver horarios disponibles</button>

        <div id="horariosDisponibles"></div>
    </div>

    <script>
        var pistaId = {{ $pista->id }};
        var usuarioId = {{ Auth::user()->id }};


    </script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{ asset('js/calendario.js') }}"></script>



@endsection
