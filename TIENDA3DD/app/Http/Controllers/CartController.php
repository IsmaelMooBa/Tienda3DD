<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de importar tu modelo Producto
use App\Models\CartItem; // Si estás usando un modelo para el carrito

class CartController extends Controller
{
    public function index()
    {
        // Obtener los items del carrito (depende de tu implementación)
        // Si usas sesión:
        $carrito = session()->get('cart', []);
        
        // Si usas base de datos:
        // $carrito = auth()->user()->cartItems()->with('producto')->get();
        
        return view('cart.index', compact('carrito'));
    }

    public function add(Request $request, $productoId)
    {
        $producto = Producto::findOrFail($productoId);
        
        // Implementación con sesión
        $cart = session()->get('cart', []);
        
        if(isset($cart[$productoId])) {
            $cart[$productoId]['cantidad']++;
        } else {
            $cart[$productoId] = [
                'producto_id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1
            ];
        }
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function remove($id)
    {
        // Implementación con sesión
        $cart = session()->get('cart');
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    public function checkout(Request $request)
{
    // Obtener los items del carrito
    $cartItems = session()->get('cart', []);
    
   
    if (empty($cartItems)) {
        return redirect()->route('cart.index')->with('error', 'El carrito está vacío');
    }
    
    try {
       
        session()->forget('cart');
        
        return redirect()->route('cart.index')->with('success', 'Compra realizada con éxito');
    } catch (\Exception $e) {
        return redirect()->route('cart.index')->with('error', 'Error al procesar la compra: '.$e->getMessage());
    }
}
}