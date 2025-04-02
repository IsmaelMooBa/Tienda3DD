@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" class="form-input">
        </div>

        <button type="submit" class="btn-guardar">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn-volver">Volver a la lista</a>
    </form>

</div>
@endsection