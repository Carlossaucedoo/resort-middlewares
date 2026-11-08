<header class="cabecera">
    <div class="contenedor cabecera__contenido">
        <a href="{{ route('home') }}" class="cabecera__logo">Resort Atlántico</a>

        <nav class="menu" aria-label="Zonas del resort">
            <a href="{{ route('home') }}" @class(['menu__enlace', 'activo' => request()->routeIs('home')])>Recepción</a>
            <a href="{{ route('panel') }}" @class(['menu__enlace', 'activo' => request()->routeIs('panel')])>Habitación</a>
            <a href="{{ route('casino') }}" @class(['menu__enlace', 'activo' => request()->routeIs('casino')])>Casino</a>
            <a href="{{ route('admin') }}" @class(['menu__enlace', 'activo' => request()->routeIs('admin')])>Dirección</a>
        </nav>

        <div class="usuario">
            @auth
                <span class="usuario__saludo">Hola, {{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="boton boton--secundario">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="boton boton--secundario">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="boton">Crear cuenta</a>
            @endauth
        </div>
    </div>
</header>
