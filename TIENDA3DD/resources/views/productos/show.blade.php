@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>

    <div class="product-details">
        <h2>{{ $producto->nombre }}</h2>
        <p><strong>Marca:</strong> {{ $producto->marca }}</p>
        <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>

        @if($producto->imagen)
            <div class="product-image">
                <p><strong>Imagen:</strong></p>
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            </div>
        @endif
    </div>

    <div class="product-actions">
        <a href="{{ route('productos.index') }}" class="btn-volver">Volver a la lista</a>
        <a href="{{ route('productos.edit', $producto) }}" class="btn-editar">Editar</a>

        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-eliminar">Eliminar</button>
        </form>
    </div>
</div>
@endsection