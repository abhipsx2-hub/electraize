<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\EWasteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/repair', [RepairController::class, 'index'])->name('repair.index');
Route::post('/repair', [RepairController::class, 'store'])->name('repair.store');

Route::get('/e-waste', [EWasteController::class, 'index'])->name('ewaste.index');
Route::post('/e-waste', [EWasteController::class, 'store'])->name('ewaste.store');

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{product}', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    });
});
