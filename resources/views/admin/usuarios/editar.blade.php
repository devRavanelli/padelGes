@extends('layouts.admin') <!-- Extiende la plantilla base -->

@section('title', 'Editar Usuario') <!-- Título específico de la vista -->

@section('content') <!-- Sección de contenido específica para esta vista -->
<link rel="stylesheet" href="{{ asset('css/añadirUsuario.css') }}">

<div class="content">
    <link rel="stylesheet" href="{{ asset('css/editarUsuario.css') }}">
    <div id="editarUsuario">



        <form id="editUserForm" method="POST" action="{{ route('admin.usuarios.actualizar', $usuario->id) }}">
            @csrf <!-- Protección contra ataques CSRF -->
            @method('PUT') <!-- Método PUT para actualización -->

            <!-- Nombre -->
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}" placeholder="Nombre" required>

            <!-- Apellidos -->
            <input type="text" name="apellido1" value="{{ old('apellido1', $usuario->apellido1) }}" placeholder="Primer apellido" required>
            <input type="text" name="apellido2" value="{{ old('apellido2', $usuario->apellido2) }}" placeholder="Segundo apellido">

            <!-- DNI -->
            <input type="text" name="dni" value="{{ old('dni', $usuario->dni) }}" placeholder="DNI" required>

            <!-- Email -->
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" placeholder="Email" required>

            <!-- Teléfono -->
            <input type="tel" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" placeholder="Teléfono" required maxlength="9">

            <!-- Dirección -->
            <input type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}" placeholder="Dirección" required>

            <div class="form-row">
                <!-- Rol -->
                <div class="rol">
                    <label for="rol">Rol:</label>
                    <select name="rol" id="rol">
                        <option value="socio" {{ old('rol', $usuario->rol) == 'socio' ? 'selected' : '' }}>Socio</option>
                        <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Nivel -->
                <div class="nivel">
                    <label for="nivel">Nivel:</label>
                    <select name="nivel" id="nivel" required>
                        @for ($i = 1.0; $i <= 7.0; $i += 0.5)
                            <option value="{{ number_format($i, 1) }}" {{ old('nivel', $usuario->nivel) == number_format($i, 1) ? 'selected' : '' }}>
                                {{ number_format($i, 1) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <!-- Radio buttons para el sexo -->
            <div class="sexo">
                <label>Sexo:</label>
                <label>
                    <input type="radio" name="sexo" value="M" {{ old('sexo', $usuario->sexo) == 'M' ? 'checked' : '' }}> Masculino
                </label>
                <label>
                    <input type="radio" name="sexo" value="F" {{ old('sexo', $usuario->sexo) == 'F' ? 'checked' : '' }}> Femenino
                </label>
            </div>

            <!-- Contraseña -->
            <input type="password" name="password" placeholder="Nueva Contraseña (Opcional)">
            <input type="password" name="password_confirmation" placeholder="Confirmar Nueva Contraseña (Opcional)">

            <!-- Botones -->
            <div class="botones">
                <button type="submit">Guardar Cambios</button>
                <a href="{{ route('admin.usuarios.mostrar') }}" class="cancelar" id="cancelar">Cancelar</a>
            </div>
        </form>

    </div>
</div>
<script src="{{ asset('js/editarUsuario.js') }}"></script>
@endsection <!-- Cierra la sección de contenido específica -->
