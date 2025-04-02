@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">Lista de Productos</h1>
    
    <div class="products-grid">
        @foreach($productos as $producto)
        <div class="product-card">
            <!-- Imagen del producto -->
            <div class="product-image-container">
                @if($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image">
                @else
                <div class="no-image-placeholder">
                    <span>No hay imagen</span>
                </div>
                @endif
            </div>
            
            <!-- Información del producto -->
            <div class="product-info">
                <h3 class="product-name">{{ $producto->nombre }}</h3>
                <p class="product-brand">Marca: {{ $producto->marca }}</p>
                <p class="product-price">${{ number_format($producto->precio, 2) }}</p>
            </div>
            
            <!-- Botones de acción (EXACTAMENTE COMO LOS TENÍAS) -->
            <div class="product-actions">
                <a href="{{ route('productos.show', $producto) }}" class="btn-ver">Ver</a>
                <a href="{{ route('productos.edit', $producto) }}" class="btn-editar">Editar</a>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar">Eliminar</button>
                </form>
                <form action="{{ route('cart.add', $producto) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-agregar">Agregar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection