<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DataAppController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TestimoniController;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('about-us', [\App\Http\Controllers\DataAppController::class, 'showAboutUs'])->name('about-us');
Route::get('detail/{id}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('produk', [\App\Http\Controllers\HomeController::class, 'produk'])->name('produk');
Route::get('berita', [\App\Http\Controllers\HomeController::class, 'berita'])->name('berita');
Route::get('kategori1', [\App\Http\Controllers\HomeController::class, 'kategori1'])->name('kategori1');
Route::get('kategori2', [\App\Http\Controllers\HomeController::class, 'kategori2'])->name('kategori2');
Route::get('kategori3', [\App\Http\Controllers\HomeController::class, 'kategori3'])->name('kategori3');
Route::get('produk-kategori/{id}', [\App\Http\Controllers\HomeController::class, 'produkCategories'])->name('produk.kategori');


Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/dummy', [\App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('data-products', [ProductController::class, 'getProducts'])->name('get.products');
Route::resource('products', ProductController::class);

Route::get('data-size', [SizeController::class, 'getSize'])->name('get.size');
Route::resource('sizes', SizeController::class);

Route::get('data-color', [ColorController::class, 'getColor'])->name('get.color');
Route::resource('colors', ColorController::class);

Route::get('data-categories', [CategoriesController::class, 'getCategories'])->name('get.category');
Route::resource('category', CategoriesController::class);

Route::get('data-product-categories', [ProductCategoriesController::class, 'getProductCategories'])->name('get.pc');
Route::resource('product-categories', ProductCategoriesController::class);

Route::get('data-product-images', [ProductImagesController::class, 'getProductImages'])->name('get.pi');
Route::resource('product-images', ProductImagesController::class);

Route::get('data-testimoni', [TestimoniController::class, 'getTestimonies'])->name('get.testimoni');
Route::resource('testimoni', TestimoniController::class);

Route::resource('identitas-app', DataAppController::class);

Route::post('download-katalog', [\App\Http\Controllers\UserDownloadedCatalogueController::class, 'download'])->name('download.catalog');
Route::get('user-downloaded-katalog', [\App\Http\Controllers\UserDownloadedCatalogueController::class, 'index'])->name('show.download.catalog');
Route::delete('user-downloaded-katalog/{id}', [\App\Http\Controllers\UserDownloadedCatalogueController::class, 'destroy'])->name('delete.download.catalog');
Route::get('ajax/user-downloaded-katalog', [\App\Http\Controllers\UserDownloadedCatalogueController::class, 'showData'])->name('ajax.show.download.catalog');

Auth::routes();
