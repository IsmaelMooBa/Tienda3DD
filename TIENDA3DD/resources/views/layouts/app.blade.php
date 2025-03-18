<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <!-- Logo a la izquierda -->
            <div class="navbar-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>

            <!-- Botones en el centro -->
            <div class="navbar-buttons">
                <!-- Eliminar los enlaces a 'users' y 'adminss' -->
            </div>

            <!-- Carrito de compras a la derecha -->
            <div class="navbar-cart">
                <a href="{{ route('cart.index') }}" class="navbar-button cart-button">
                    <img src="{{ asset('images/carrito_compras.png') }}" class="cart-icon" alt="Carrito">
                    Carrito
                </a>
            </div>
        </div>
        <!-- Raya roja en la parte inferior -->
        <div class="navbar-red-line"></div>
    </nav>

    <!-- Contenido principal -->
    <main>
        @yield('content')
    </main>
</body>
</html>
