<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    // Añadir producto al carrito
    public function add(Request $request, Producto $producto)
    {
        $cartItem = Cart::where('producto_id', $producto->id)->first();

        if ($cartItem) {
            $cartItem->increment('cantidad');
        } else {
            Cart::create([
                'producto_id' => $producto->id,
                'cantidad' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    // Mostrar el carrito
    public function index()
    {
        $carrito = Cart::with('producto')->get();
        return view('cart.index', compact('carrito'));
    }

    // Eliminar producto del carrito
    public function remove($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }
}
