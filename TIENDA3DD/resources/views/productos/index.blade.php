@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>

    <a href="{{ route('productos.create') }}" class="create-product-button">Crear Producto</a>

    @foreach($productos as $producto)
        <div class="product-item">
            <h3>{{ $producto->nombre }}</h3>
            <p>Marca: {{ $producto->marca }}</p>
            <p>Precio: ${{ $producto->precio }}</p>
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
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
                
            </div>
        </div>
    @endforeach
</div>
@endsection