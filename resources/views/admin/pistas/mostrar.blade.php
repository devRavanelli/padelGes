@extends('layouts.admin')

@section('title', 'Pistas')
<link rel="stylesheet" href="{{ asset('css/pistas.css') }}" type="text/css">
@section('content')


<div class="pistas-container">
    @foreach ($pistas as $pista)
        <a href="{{ route('admin.pistas.detalle', $pista->id) }}" class="pista-link">
            <div class="pista-card">
                 <img src="{{ asset('storage/' . ($pista->imagen ?? 'default.jpg')) }}"
                     alt="Imagen de {{ $pista->nombre_pista }}">
                <h3>{{ $pista->nombre_pista }}</h3>
            </div>
        </a>
    @endforeach
</div>





@endsection
