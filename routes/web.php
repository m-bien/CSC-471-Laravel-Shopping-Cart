<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;

// home
Route::get('/', [ProductsController::class, 'index']);
Route::resource('products', ProductsController::class);

// cart
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');

// checkout + order history
Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('orders', [OrderController::class, 'orders'])->name('orders');

// admin
Route::get('/admin/admin', [OrderController::class, 'admin'])->name('admin');
Route::get('/admin/create', [OrderController::class, 'create'])->name('admin.create');
Route::get('/admin/update', [OrderController::class, 'update'])->name('admin.update');
