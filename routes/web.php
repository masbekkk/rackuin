<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('detail', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('data-products', [ProductController::class, 'getProducts'])->name('get.products');
Route::resource('products', ProductController::class);

Route::get('data-size', [SizeController::class, 'getSize'])->name('get.size');
Route::resource('sizes', SizeController::class);

Route::get('data-color', [ColorController::class, 'getColor'])->name('get.color');
Route::resource('colors', ColorController::class);

Route::get('data-categories', [CategoriesController::class, 'getCategories'])->name('get.category');
Route::resource('category', CategoriesController::class);

Auth::routes();
