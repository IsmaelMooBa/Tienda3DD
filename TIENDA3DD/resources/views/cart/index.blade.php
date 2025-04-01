@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    @if(count($carrito) > 0)
        @foreach($carrito as $id => $item)
        <div class="cart-item">
            <h3>{{ $item['nombre'] }}</h3>
            <p>Precio: ${{ $item['precio'] }}</p>
            <p>Cantidad: {{ $item['cantidad'] }}</p>
            <form action="{{ route('cart.remove', $id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-eliminar">Eliminar</button>
            </form>
        </div>
        @endforeach

        <!-- Sección del total y botón de comprar -->
        <div class="cart-summary">
            <h3>Total: ${{ array_sum(array_map(function($item) {
                return $item['precio'] * $item['cantidad'];
            }, $carrito)) }}</h3>
            
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-comprar">Comprar ahora</button>
            </form>
        </div>
    @else
        <p>Tu carrito está vacío</p>
    @endif

    <a href="{{ route('productos.index') }}" class="btn-volver">Volver a Productos</a>
</div>
@endsection