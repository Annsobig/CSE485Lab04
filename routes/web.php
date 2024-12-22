<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('customers', \App\Http\Controllers\CustomerController::class);
Route::resource('orders', \App\Http\Controllers\OrderController::class);

});


