<!-- resources/views/admin/usuarios/mostrar.blade.php -->

@extends('layouts.admin') <!-- Extiende la plantilla base -->

@section('title', 'Mostrar Usuarios') <!-- Título específico de la vista -->

@section('content') <!-- Sección de contenido específica para esta vista -->

    <div class="content">
        <div style="width: 100%">
            <h1>Usuarios</h1>
        </div>

       <!-- Formulario de búsqueda y botón para mostrar todos los usuarios -->
<div class="search-form">
    <form id="searchForm" method="GET" action="{{ route('admin.usuarios.mostrar') }}">
        <!-- Campo de búsqueda -->
        <input type="text" name="search" id="searchInput" class="search-input" placeholder="Buscar usuario" value="{{ request('search') }}">

        <!-- Botón para buscar -->
        <button type="submit" class="mostrar-usuarios">
            <i class="fa-solid fa-magnifying-glass"></i> Buscar
        </button>

        <!-- Botón para mostrar todos -->
        <a href="{{ route('admin.usuarios.mostrar') }}" class="mostrar-usuarios">
            Mostrar todos
        </a>
    </form>
</div>


        <!-- Tabla para mostrar usuarios -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <th><i class="fa-solid fa-power-off"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr data-href="{{ route('admin.usuarios.detalle', $usuario->id) }}" class="clickable-row">
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido1 }} {{ $usuario->apellido2 }}</td>
                        <td>{{ $usuario->dni }}</td>
                        <td>{{ ucfirst($usuario->rol) }}</td>
                        <td>{{ $usuario->activo ? 'Sí' : 'No' }}</td>
                        <td>
                            <form action="{{ route('admin.usuarios.mostrar.toggle', $usuario->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')

                                @if ($usuario->activo)
                                    <button type="submit" class="estado-btn desactivar"></button>
                                @else
                                    <button type="submit" class="estado-btn activar"></button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="botones-inferiores">
            <div class="btn-añadir-usuario">
                <!-- Botón para agregar un nuevo usuario -->
                <a href="/admin/usuarios/crear" class="mostrar-usuarios">Añadir Usuario</a>
                </div>
            <!-- Paginación -->
            <div class="pagination">
                {{ $usuarios->links() }}
            </div>

        </div>

    </div>

@endsection <!-- Cierra la sección de contenido específica -->
