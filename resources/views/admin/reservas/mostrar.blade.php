@extends('layouts.admin')

@section('title', 'Lista de Reservas')
<link rel="stylesheet" href="{{ asset('css/reservas.css') }}">

@section('content')
    <div class="content">
        <h2>Lista de Reservas</h2>

        <div class="search-form">
            <form id="searchForm" method="GET" action="{{ route('admin.reservas.mostrar') }}">
                <!-- Campo de búsqueda por nombre -->
                <input type="text" name="search" id="searchInput" class="search-input" placeholder="Buscar usuario"
                    value="{{ request('search') }}">

                <!-- Filtro por fecha -->
                <input type="date" name="fecha" class="fechaInput" class="search-input" value="{{ request('fecha') }}">

                <!-- Filtro por pista -->
                <select name="id_pista" class="pistaSelect" class="search-input">
                    <option value="">Seleccionar Pista</option>
                    @foreach ($pistas as $pista)
                        <option value="{{ $pista->id }}" {{ request('id_pista') == $pista->id ? 'selected' : '' }}>
                            {{ $pista->nombre_pista }}</option>
                    @endforeach
                </select>

                <!-- Botón para buscar -->
                <button type="submit" class="mostrar-usuarios">
                    <i class="fa-solid fa-magnifying-glass"></i> Buscar
                </button>

                <!-- Botón para mostrar todos -->
                <a href="{{ route('admin.reservas.mostrar') }}" class="mostrar-usuarios">
                    Mostrar todos
                </a>
            </form>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="columna-num-reserva">Nº</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th class="mostrar-columna">Apellidos</th>
                    <th>Pista</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('Y-m-d') }}</td>
                        <td>{{ $reserva->usuario->nombre }}</td>
                        <td class="mostrar-columna">{{ $reserva->usuario->apellido1 }} {{ $reserva->usuario->apellido2 }} </td>
                        <td>{{ $reserva->pista->nombre_pista }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->franja->hora_inicio)->format('H:i') }}</td>
                        <td>
                            <div class="form-buttons">

                                <a href="{{ route('admin.reservas.editar', $reserva->id) }}" class="btn-editar"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.reservas.destroy', $reserva->id) }}" method="POST"
                                    id="deleteForm{{ $reserva->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-eliminar" id="deleteBtn{{ $reserva->id }}"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="botones-inferiores">
            <div class="btn-añadir-usuario">
                <!-- Botón para agregar un nuevo usuario -->
                <a href="/admin/reservas/crear" class="mostrar-usuarios">Crear reserva</a>
            </div>
            <!-- Paginación -->
            <div class="pagination">
                {{ $reservas->links() }}
            </div>

        </div>
    </div>
    <script src="{{ asset('js/reservas.js') }}"></script>
@endsection
