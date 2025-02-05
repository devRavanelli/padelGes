@extends('layouts.admin')

@section('title', 'Editar Reserva')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/reservas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editarUsuario.css') }}">

    <div class="content">
        <div id="editarUsuario">
            <form id="editUserForm" method="POST" action="{{ route('admin.reservas.actualizar', $reserva->id) }}">
                @csrf
                @method('PUT')

                <!-- Campo para seleccionar la fecha -->
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" value="{{ $reserva->fecha->format('Y-m-d') }}"
                        required>
                </div>

                <!-- Campo para seleccionar la pista -->
                <div class="form-group">
                    <label for="id_pista">Pista:</label>
                    <select id="id_pista" name="id_pista" class="pistaSelect" required>
                        @foreach ($pistas as $pista)
                            <option value="{{ $pista->id }}" {{ $pista->id == $reserva->id_pista ? 'selected' : '' }}>
                                {{ $pista->nombre_pista }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para seleccionar la hora -->
                <div class="form-group">
                    <label for="id_franja">Hora:</label>
                    <select id="id_franja" name="id_franja" class="pistaSelect" required>
                        @foreach ($franjas as $franja)
                            <option value="{{ $franja->id }}" {{ $franja->id == $reserva->id_franja ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($franja->hora_inicio)->format('H:i') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para seleccionar el usuario -->
                <div class="form-group">
                    <label for="id_usuario">Usuario:</label>
                    <select id="id_usuario" name="id_usuario" class="pistaSelect" required>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"
                                {{ $usuario->id == $reserva->id_usuario ? 'selected' : '' }}>
                                {{ $usuario->nombre }} {{ $usuario->apellido1 }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" id="confirmar-reserva" class="btn-crear">Actualizar Reserva</button>
                <button type="button" class="cancelar" id="cancelar">Cancelar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/editarReserva.js') }}"></script>
@endsection
