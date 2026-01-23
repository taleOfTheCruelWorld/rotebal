<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index']);
Route::get('/category/{Category}', [MainController::class,'categoryShow']);
Route::get('/category', [MainController::class,'categoryList']);
Route::get('/category/{Category}', [MainController::class,'categoryShow'])->name('category');
Route::get('/product/{Product}', [MainController::class,'productShow']);
Route::get('/product', [MainController::class,'productList']);
Route::get('/country/{Country}', [MainController::class,'countryShow']);
Route::get('/search', [MainController::class,'search']);
