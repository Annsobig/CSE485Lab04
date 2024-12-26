<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderDetailController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('customers', CustomerController::class);
 Route::resource('products', ProductController::class);
// Route::resource('orders', OrderController::class);
// Route::resource('order_details', OrderDetailController::class);
// Route::get('/', [ProductController::class]);

