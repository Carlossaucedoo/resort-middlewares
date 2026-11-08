@extends('layouts.app')

@section('titulo', 'Recepción')

@section('contenido')
    <section class="portada">
        <h1>Bienvenido al Resort Atlántico</h1>
        <p>Estás en la recepción, la única zona abierta a todo el mundo. Para entrar en el resto del complejo nuestros porteros comprobarán quién eres.</p>
    </section>

    <section class="zonas">
        <article class="zona">
            <h2>Habitación</h2>
            <p>Tu espacio privado dentro del resort. Solo para clientes que hayan iniciado sesión.</p>
            <a href="{{ route('panel') }}">Ir a mi habitación</a>
        </article>

        <article class="zona">
            <h2>Casino</h2>
            <p>Sala de juegos exclusiva para clientes mayores de 18 años.</p>
            <a href="{{ route('casino') }}">Entrar al casino</a>
        </article>

        <article class="zona">
            <h2>Dirección</h2>
            <p>La oficina desde la que se gestiona el resort. Solo para administradores.</p>
            <a href="{{ route('admin') }}">Ir a dirección</a>
        </article>
    </section>
@endsection
