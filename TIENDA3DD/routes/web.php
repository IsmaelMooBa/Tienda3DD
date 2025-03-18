<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;

// Hacer que el index de productos sea la ruta principal
Route::get('/', [ProductoController::class, 'index']);
Route::resource('productos', ProductoController::class);

Route::post('/cart/add/{producto}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

