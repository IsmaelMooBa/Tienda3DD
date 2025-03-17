<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Hacer que el index de productos sea la ruta principal
Route::get('/', [ProductoController::class, 'index']);

Route::resource('productos', ProductoController::class);
