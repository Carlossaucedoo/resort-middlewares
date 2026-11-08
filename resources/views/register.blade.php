@extends('layouts.app')

@section('titulo', 'Crear cuenta')

@section('contenido')
    <section class="tarjeta tarjeta--formulario">
        <h1>Crear cuenta</h1>
        <p>Regístrate como cliente del resort. Tu edad decide si puedes entrar al casino.</p>

        <form action="{{ route('register.store') }}" method="POST" class="formulario">
            @csrf

            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="age">Edad</label>
            <input type="number" id="age" name="age" value="{{ old('age') }}" min="1" max="120" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Repite la contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            @if ($errors->any())
                <p class="error">{{ $errors->first() }}</p>
            @endif

            <button type="submit" class="boton">Crear cuenta</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>.</p>
    </section>
@endsection
