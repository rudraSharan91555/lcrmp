<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('/add-product',function(){
    return view('admin.add-product');
})->middleware('auth');

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');
