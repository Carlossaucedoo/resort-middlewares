@extends('layouts.app')

@section('titulo', 'Acceso denegado')

@section('contenido')
    <section class="tarjeta">
        <h1>403 · Acceso denegado</h1>
        <p>{{ $exception->getMessage() ?: 'No tienes permiso para entrar en esta zona.' }}</p>
        <p><a href="{{ route('home') }}">Volver a la recepción</a></p>
    </section>
@endsection
