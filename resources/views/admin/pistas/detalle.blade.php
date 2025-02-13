@extends('layouts.admin')

@section('title', 'Detalle de Pista')
<link rel="stylesheet" href="{{ asset('css/pistas.css') }}" type="text/css">
@section('content')
<div class="pista-detalle">
    <h1 class="pista-titulo">{{ $pista->nombre_pista }}</h1>

    <div class="pista-imagen-container">
        <img src="{{ asset('storage/' . ($pista->imagen ?? 'default.jpg')) }}" alt="Imagen de {{ $pista->nombre_pista }}" class="pista-imagen">
    </div>

    <div class="pista-info">
        <h3><strong>Pared:</strong> {{ $pista->tipo_pared ?? 'No especificado' }}</h3>
        <h3><strong>Superficie:</strong> {{ $pista->tipo_suelo ?? 'No especificado' }}</h3>
        <p class="pista-descripcion">{{ $pista->descripcion ?? 'Sin descripción disponible.' }}</p>
    </div>

    <div class="pista-boton">
        <a href="{{ route('admin.pistas.mostrar') }}" class="btn-volver">⬅ Volver a la lista</a>
        <a href="{{ route('admin.pistas.editar', $pista->id) }}" class="btn-editar">✏️ Editar Pista</a>
    </div>
</div>
@endsection
