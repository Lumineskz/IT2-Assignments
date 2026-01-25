<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::match(['get', 'post'], '/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::match(['get', 'post'], '/products/{product}/update',[ProductController::class,'update'])->name('products.update');
Route::post('/products/{product}/delete',[ProductController::class,'delete'])->name('products.delete');
