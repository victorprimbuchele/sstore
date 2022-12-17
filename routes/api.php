<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


// Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/getTypesOfQuery', [ProductController::class, 'getTypesOfQuery']);

// User
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/user/register', [UserController::class, 'store']);

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::put('/user/{user}', [UserController::class, 'update']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
    Route::get('/user/{user}', [UserController::class, 'show']);
});