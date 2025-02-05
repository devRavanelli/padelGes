@extends('layouts.admin')

@section('title', 'Crear Reserva')

@section('content')
<link rel="stylesheet" href="{{ asset('css/reservas.css') }}">

<div class="content">
    <div class="crear-reserva" id="crear-reserva">
        <h2>Crear Reserva</h2>

        <form id="form-reserva" action="{{ route('admin.reservas.store') }}" method="POST">
            @csrf

            <!-- Campo para seleccionar la fecha -->
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="fechaInput" required min="<?= date('Y-m-d') ?>">
            </div>

            <!-- Campo para seleccionar la pista -->
            <div class="form-group">
                <label for="id_pista">Pista:</label>
                <select id="id_pista" name="id_pista" class="pistaSelect" required>
                    <option value="">Selecciona una pista</option>
                    @foreach($pistas as $pista)
                        <option value="{{ $pista->id }}">{{ $pista->nombre_pista }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para seleccionar la hora -->
            <div class="form-group">
                <label for="id_franja">Hora:</label>
                <select id="id_franja" name="id_franja" class="form-control" required>
                    <option value="">Selecciona una hora</option>
                </select>
            </div>

            <!-- Campo para seleccionar el usuario -->
            <div class="form-group">
                <label for="id_usuario">Usuario:</label>
                <select id="id_usuario" name="id_usuario" class="pistaSelect select2" required>
                    <option value="">Selecciona un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido1}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" id="confirmar-reserva" class="btn-crear">Crear Reserva</button>
            <button type="button" class="cancelar" id="cancelar">Cancelar</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/crearReserva.js') }}"></script>
@endsection
