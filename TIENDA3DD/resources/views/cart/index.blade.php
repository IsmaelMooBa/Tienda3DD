@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    @foreach($carrito as $item)
    <div class="cart-item">
        @if ($item->producto)
            <h3>{{ $item->producto->nombre }}</h3>
            <p>Marca: {{ $item->producto->marca }}</p>
            <p>Precio: ${{ $item->producto->precio }}</p>
            <p>Cantidad: {{ $item->cantidad }}</p>
            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-eliminar">Eliminar</button>
            </form>
        @else
            <p>Este producto ya no está disponible.</p>
        @endif
    </div>
@endforeach


    <a href="{{ route('productos.index') }}" class="btn-volver">Volver a Productos</a>
</div>
@endsection
