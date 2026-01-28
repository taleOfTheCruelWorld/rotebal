<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index'])->name('index');
Route::get('/category', [MainController::class,'categoryList'])->name('categories');
Route::get('/category/{Category}', [MainController::class,'categoryShow'])->name('category');
Route::get('/product', [MainController::class,'productList'])->name('products');
Route::get('/product/{Product}', [MainController::class,'productShow'])->name('product');
Route::get('/country/{Country}', [MainController::class,'countryShow'])->name('country');
Route::get('/search', [MainController::class,'search'])->name('search');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/register', [AuthController::class,'registerHandle'])->name('registerHandle');
Route::post('/login', [AuthController::class,'loginHandle'])->name('loginHandle');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/cabinet', [AuthController::class,'cabinet'])->name('cabinet')->middleware('auth');
Route::post('/cabinet/changePass', [AuthController::class,'changePass'])->name('changePass')->middleware('auth');
Route::post('/product/{Product}/review', [MainController::class,'review'])->name('review')->middleware('auth');
/* Route::get('/cabinet/changePassword', [AuthController::class,'cabinet'])->name('changePassword')->middleware('auth'); */


