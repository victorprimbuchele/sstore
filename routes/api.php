<?php

use App\Http\Controllers\ProductController;
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
