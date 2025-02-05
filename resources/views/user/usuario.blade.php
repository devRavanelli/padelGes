@extends('layouts.webPage')

@section('title', 'Usuario - Pádel Resort Valencia')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/usuario.css') }}" type="text/css">
@endsection
@section('content')

    <h1>Mis Reservas</h1>
    <div id="reservas-container">
        @if ($reservas->isEmpty())
        <p>No tienes reservas.</p>
    @else
        <table class="reservations-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Pista</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('Y-m-d') }}</td>
                        <td>{{ $reserva->pista->nombre_pista }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->franja->hora_inicio)->format('H:i') }}</td>
                        <td>
                            @if (\Carbon\Carbon::parse($reserva->fecha)->isFuture())
                                <!-- Formulario para cancelar reserva -->
                                <form action="{{ route('reservas.cancelarReserva', $reserva->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-cancelar">Cancelar</button>
                                </form>
                            @else
                            <span class="expired"><i class="fa-solid fa-calendar-xmark"></i> Expirado</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>


@endsection
