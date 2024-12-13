<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('/add-product',function(){
return view('admin.add-product');
})->middleware('auth');
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.all-products');


Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');
Route::get('/all-products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class, 'delete'])->middleware('auth');
Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class, 'edit'])->middleware('auth');
Route::post('/edit',[App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');
