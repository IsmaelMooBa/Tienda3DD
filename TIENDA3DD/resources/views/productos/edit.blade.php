@extends('layouts.app')

@section('content')
<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

    <label>Marca:</label>
    <input type="text" name="marca" value="{{ $producto->marca }}" required>

    <label>Precio:</label>
    <input type="number" name="precio" value="{{ $producto->precio }}" step="0.01" required>

    <label>Imagen:</label>
    <input type="file" name="imagen">

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('productos.index') }}">Volver a la lista</a>
@endsection
