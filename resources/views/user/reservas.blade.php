@extends('layouts.webPage')

@section('title', 'Reservas - Pádel Resort Valencia')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pistas.css') }}" type="text/css">
@endsection

@section('content')

<div class="pistas-container">
    <p>PAQUITOOOO</p>
    @foreach ($pistas as $pista)
    <a href="{{ route('user.calendario', $pista->id) }}" class="pista-link">
            <div class="pista-card">
                 <img src="{{ asset('storage/' . ($pista->imagen ?? 'default.jpg')) }}"
                     alt="Imagen de {{ $pista->nombre_pista }}">
                <h3>{{ $pista->nombre_pista }}</h3>
            </div>
        </a>
    @endforeach
</div>

@endsection
