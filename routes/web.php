<?php

use App\Http\Controllers\AuthController;
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
Route::get('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'registerHandle']);
Route::post('/login', [AuthController::class,'loginHandle']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

