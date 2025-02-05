@extends('layouts.admin') <!-- Extiende la plantilla base -->

@section('title', 'Crear Usuario') <!-- Título específico de la vista -->

@section('content') <!-- Sección de contenido específica para esta vista -->
<link rel="stylesheet" href="{{ asset('css/añadirUsuario.css') }}">

    <div class="content">

        <div id="añadirUsuario">



            <form id="addUserForm" method="POST" action="{{ route('admin.usuarios.store') }}">
                @csrf <!-- Protección contra ataques CSRF -->

                <!-- Nombre -->
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>

                <!-- Apellidos -->
                <input type="text" name="apellido1" placeholder="Primer apellido" required>
                <input type="text" name="apellido2" placeholder="Segundo apellido">

                <!-- DNI -->
                <input type="text" name="dni" placeholder="DNI" required>

                <!-- Email -->
                <input type="email" name="email" placeholder="Email" required>

                <!-- Teléfono -->
                <input type="tel" name="telefono" placeholder="Teléfono" required maxlength="9">

                <!-- Dirección -->
                <input type="text" name="direccion" placeholder="Dirección" required>

                <div class="form-row">
                    <!-- Rol -->
                    <div class="rol">
                        <label for="rol">Rol:</label>
                        <select name="rol" id="rol">
                            <option value="socio" selected>Socio</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <!-- Nivel -->
                    <div class="nivel">
                        <label for="nivel">Nivel:</label>
                        <select name="nivel" id="nivel" required>
                            @for ($i = 1.0; $i <= 7.0; $i += 0.5)
                                <option value="{{ number_format($i, 1) }}">{{ number_format($i, 1) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Radio buttons para el sexo -->
                <div class="sexo">
                    <label>Sexo:</label>
                    <label>
                        <input type="radio" name="sexo" value="M" required> Masculino
                    </label>
                    <label>
                        <input type="radio" name="sexo" value="F" required> Femenino
                    </label>
                </div>

                <!-- Contraseña -->
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>

                <!-- Botones -->
                <div class="botones">
                    <button type="submit">Añadir Usuario</button>
                    <button type="button" id="cancelar">Cancelar</button>
                </div>
            </form>

        </div>
    </div>
    <script src="{{ asset('js/añadirUsuario.js') }}"></script>
@endsection <!-- Cierra la sección de contenido específica -->

