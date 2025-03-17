@extends('layouts.app')

@section('content')
<h1>Lista de Productos</h1>

<a href="{{ route('productos.create') }}">Crear Producto</a>

@foreach($productos as $producto)
    <div>
        <h3>{{ $producto->nombre }}</h3>
        <p>Marca: {{ $producto->marca }}</p>
        <p>Precio: ${{ $producto->precio }}</p>
        <a href="{{ route('productos.show', $producto) }}">Ver</a>
        <a href="{{ route('productos.edit', $producto) }}">Editar</a>
        <form action="{{ route('productos.destroy', $producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </div>
@endforeach
@endsection
