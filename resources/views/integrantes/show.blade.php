@extends('layouts.app')
@section('titulo', 'Detalle de Integrante')
@section('contenido')
    <h1>Detalle del Integrante</h1>
    <x-alerta>Conoce a los creadores de la plataforma</x-alerta>
    <p><strong>ID:</strong> {{ $integrante->id }}</p>
    <p><strong>Nombre:</strong> {{ $integrante->nombre }}</p>
    <p><strong>Rol:</strong> {{ $integrante->rol }}
        @if ($integrante->rol == 'Coordinador')
            ★ Coordinador
        @endif
    </p>
    <p><a href="{{ url('/integrantes') }}">← Volver a integrantes</a></p>
@endsection
