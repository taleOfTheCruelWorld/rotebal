<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index'])->name('index');
Route::get('/category', [CategoryController::class,'categoryList'])->name('categories');
Route::get('/category/{Category}', [CategoryController::class,'categoryShow'])->name('category');
Route::get('/product', [ProductController::class,'productList'])->name('products');
Route::get('/product/{Product}', [ProductController::class,'productShow'])->name('product');
Route::get('/country/{Country}', [CountryController::class,'countryShow'])->name('country');
Route::get('/search', [MainController::class,'search'])->name('search');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/register', [AuthController::class,'registerHandle'])->name('registerHandle');
Route::post('/login', [AuthController::class,'loginHandle'])->name('loginHandle');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/cabinet', [AuthController::class,'cabinet'])->name('cabinet')->middleware('auth');
Route::post('/cabinet', [ReviewController::class,'reviewCheck'])->name('reviewCheck')->middleware('auth');
Route::get('/cabinet/changePass', [AuthController::class,'changePass'])->name('changePass')->middleware('auth');
Route::post('/cabinet/changePass', [AuthController::class,'changePassHandle'])->name('changePassHandle')->middleware('auth');
Route::post('/product/{Product}/review', [ReviewController::class,'review'])->name('review')->middleware('auth');

Route::prefix('admin')->group(function(){
Route::resource('categories', CategoryController::class);
});
/* Route::get('/cabinet/changePassword', [AuthController::class,'cabinet'])->name('changePassword')->middleware('auth'); */


