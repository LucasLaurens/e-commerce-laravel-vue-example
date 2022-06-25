<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StripeCheckoutController;
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

Route::get('/shopping-cart', [ShoppingCartController::class, 'index'])
    ->name('cart.index');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::post('/saveOrder', OrderController::class)
    ->name('orders.save');

Route::get('/checkout', [StripeCheckoutController::class, 'create']);
Route::post('/paymentIntent', [StripeCheckoutController::class, 'paymentIntent']);

Route::get('/dashboard', function () {
    $orders = auth()->user()->orders;

    return view('dashboard', [
        'orders' => $orders
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
