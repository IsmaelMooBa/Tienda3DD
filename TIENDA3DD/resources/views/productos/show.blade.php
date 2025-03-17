@extends('layouts.app')

@section('content')
<h1>Detalles del Producto</h1>

<h3>{{ $producto->nombre }}</h3>
<p>Marca: {{ $producto->marca }}</p>
<p>Precio: ${{ $producto->precio }}</p>

@if($producto->imagen)
    <p>Imagen:</p>
    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="200">
@endif

<a href="{{ route('productos.index') }}">Volver a la lista</a>
<a href="{{ route('productos.edit', $producto) }}">Editar</a>

<form action="{{ route('productos.destroy', $producto) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>
@endsection
