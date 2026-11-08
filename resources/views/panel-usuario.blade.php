@extends('layouts.app')

@section('titulo', 'Mi habitación')

@section('contenido')
    <section class="tarjeta">
        <h1>Bienvenido a tu habitación, {{ auth()->user()->name }}</h1>
        <p>Has pasado el control de recepción. Desde aquí puedes moverte por las zonas del resort a las que tienes acceso.</p>

        <ul class="datos">
            <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
            <li><strong>Edad:</strong> {{ auth()->user()->age }} años</li>
            <li><strong>Tipo de cliente:</strong> {{ auth()->user()->is_admin ? 'Administrador' : 'Cliente' }}</li>
        </ul>
    </section>
@endsection
