@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">Carrito de Compras</h1>
    
    @if(count($carrito) > 0)
    <div class="cart-items-container">
        @foreach($carrito as $id => $item)
        <div class="cart-item-card">
            <div class="cart-item-header">
                <span class="cart-item-title">{{ $item['nombre'] }}</span>
            </div>
            
            <div class="cart-item-body">
                <div class="cart-item-details">
                    <p class="cart-item-price">Precio: ${{ number_format($item['precio'], 2) }}</p>
                    <p class="cart-item-quantity">Cantidad: {{ $item['cantidad'] }}</p>
                    <p class="cart-item-subtotal">Subtotal: ${{ number_format($item['precio'] * $item['cantidad'], 2) }}</p>
                </div>
                
                <form action="{{ route('cart.remove', $id) }}" method="POST" class="cart-item-remove">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
        
        <div class="cart-summary-card">
            <h3 class="cart-total">Total: ${{ number_format(array_sum(array_map(function($item) {
                return $item['precio'] * $item['cantidad'];
            }, $carrito)), 2) }}</h3>
            
            <form action="{{ route('cart.checkout') }}" method="POST" class="checkout-form">
                @csrf
                <button type="submit" class="btn-comprar">Comprar ahora</button>
            </form>
        </div>
    </div>
    @else
    <div class="empty-cart-message">
        <p>Tu carrito está vacío</p>
    </div>
    @endif

    <a href="{{ route('productos.index') }}" class="btn-volver">Volver a Productos</a>
</div>
@endsection