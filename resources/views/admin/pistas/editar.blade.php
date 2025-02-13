@extends('layouts.admin')

@section('title', 'Editar Pista')
<link rel="stylesheet" href="{{ asset('css/pistas.css') }}" type="text/css">

@section('content')
<div class="pista-detalle">
    <h1 class="pista-titulo">Editar {{ $pista->nombre_pista }}</h1>

    <form action="{{ route('admin.pistas.actualizar', $pista->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_pista">Nombre de la Pista</label>
            <input type="text" id="nombre_pista" name="nombre_pista" value="{{ old('nombre_pista', $pista->nombre_pista) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion', $pista->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tipo_pared">Tipo de Pared</label>
            <input type="text" id="tipo_pared" name="tipo_pared" value="{{ old('tipo_pared', $pista->tipo_pared) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="tipo_suelo">Tipo de Suelo</label>
            <input type="text" id="tipo_suelo" name="tipo_suelo" value="{{ old('tipo_suelo', $pista->tipo_suelo) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Pista</button>
    </form>

    <div class="pista-boton">
        <a href="{{ route('admin.pistas.mostrar') }}" class="btn-volver">⬅ Volver a la lista</a>
    </div>
</div>
@endsection
