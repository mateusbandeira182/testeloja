<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/products', [ProductController::class, 'store'])->name('product.store');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::post('/products/{product}/images', [ImageController::class, 'upload'])->name('product.image.upload');

Route::delete('/products/{product}/images/{image}', [ImageController::class, 'remove'])->name('product.image.remove');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');

Route::get('/store/products/{product}', [StoreController::class, 'show'])->name('store.show');

Route::post('/store/product', [StoreController::class, 'store'])->name('store.store');

Route::get('/store/cart', [StoreController::class, 'cart'])->name('store.cart');

Route::put('/store/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::delete('/store/cart/products/{product}/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/store/cart/checkout', [CartController::class, 'store'])->name('cart.store');

Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

