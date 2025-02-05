@extends('layouts.admin')

@section('title', 'Detalle del Usuario')

@section('content')
<link rel="stylesheet" href="{{ asset('css/detalle.css') }}">
    <div class="content">
        <div style="width: 100%; margin-bottom: 20px;">
            <h1>Detalle del Usuario</h1>
        </div>

        <!-- Tabla de detalles del usuario -->
        <table class="user-details-table">
            <tr>
                <th>ID</th>
                <td>{{ $usuario->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $usuario->nombre }}</td>
            </tr>
            <tr>
                <th>Primer Apellido</th>
                <td>{{ $usuario->apellido1 }}</td>
            </tr>
            <tr>
                <th>Segundo Apellido</th>
                <td>{{ $usuario->apellido2 }}</td>
            </tr>
            <tr>
                <th>DNI</th>
                <td>{{ $usuario->dni }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $usuario->telefono }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{{ $usuario->direccion }}</td>
            </tr>
            <tr>
                <th>Nivel</th>
                <td>{{ $usuario->nivel }}</td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>{{ $usuario->sexo }}</td>
            </tr>
            <tr>
                <th>Rol</th>
                <td>{{ ucfirst($usuario->rol) }}</td>
            </tr>
            <tr>
                <th>Activo</th>
                <td>{{ $usuario->activo ? 'Sí' : 'No' }}</td>
            </tr>

        </table>

        <div class="botones">
            <a href="{{ route('admin.usuarios.mostrar') }}" class="mostrar-usuarios">Volver a la lista</a>
            <a href="{{ route('admin.usuarios.editar', $usuario->id) }}" class="mostrar-usuarios">Editar datos</a>
        </div>
    </div>


@endsection
