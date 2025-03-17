@extends('layouts.app')

@section('content')
<h1>Crear Producto</h1>

<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Marca:</label>
    <input type="text" name="marca" required>

    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" required>

    <label>Imagen:</label>
    <input type="file" name="imagen">

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('productos.index') }}">Volver a la lista</a>
@endsection
