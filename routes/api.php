<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// User
Route::post('/login', [UserController::class, 'login']);
Route::post('/user/register', [UserController::class, 'edit']);

// Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{products:id}', [ProductController::class, 'show']);

// Admin
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/products/edit', [AdminProductController::class, 'edit']);

// ShoppingCart
Route::get('/shopping-cart', [ShoppingCartsController::class, 'show']);
Route::put('/shopping-cart/{shopping_carts:id}', [ShoppingCartsController::class, 'show']);
Route::post('/shopping-cart', [ShoppingCartsController::class, 'show']);
Route::get('/shopping-cart/{shopping_carts:id}', [ShoppingCartsController::class, 'show']);
Route::delete('/shopping-cart/{shopping_carts:id}', [ShoppingCartsController::class, 'show']);


// Rotas protegidas
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    // User
    Route::get('/get-me', [UserController::class, 'index']);
    Route::put('/user/update', [UserController::class, 'edit']);
    Route::delete('/user/delete', [UserController::class, 'edit']);

    // DeliveryAddress
    Route::get('/delivery-addresses', [DeliveryAddressController::class, 'show']);
    Route::put('/delivery-addresses/{delivery_addresses:id}', [DeliveryAddressController::class, 'show']);
    Route::post('/delivery-addresses', [DeliveryAddressController::class, 'show']);
    Route::get('/delivery-addresses/{delivery_addresses:id}', [DeliveryAddressController::class, 'show']);
    Route::delete('/delivery-addresses/{delivery_addresses:id}', [DeliveryAddressController::class, 'show']);

    // PaymentMethod
    Route::get('/payment-methods', [PaymentMethodController::class, 'show']);
    Route::put('/payment-methods/{payment_methods:id}', [PaymentMethodController::class, 'show']);
    Route::post('/payment-methods', [PaymentMethodController::class, 'show']);
    Route::get('/payment-methods/{payment_methods:id}', [PaymentMethodController::class, 'show']);
    Route::delete('/payment-methods/{payment_methods:id}', [PaymentMethodController::class, 'show']);

    // Order
    Route::get('/order', [OrderController::class, 'show']);
    Route::put('/order/{order:id}', [OrderController::class, 'show']);
    Route::post('/order', [OrderController::class, 'show']);
    Route::get('/order/{order:id}', [OrderController::class, 'show']);
    Route::delete('/order/{order:id}', [OrderController::class, 'show']);

    // CreditCard
    Route::get('/credit-cards', [CreditCardsController::class, 'show']);
    Route::put('/credit-cards/{credit_cards:id}', [CreditCardsController::class, 'show']);
    Route::post('/credit-cards', [CreditCardsController::class, 'show']);
    Route::get('/credit-cards/{credit_cards:id}', [CreditCardsController::class, 'show']);
    Route::delete('/credit-cards/{credit_cards:id}', [CreditCardsController::class, 'show']);
});


// 