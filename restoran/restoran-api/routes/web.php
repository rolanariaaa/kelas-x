<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Kategori CRUD
Route::resource('kategoris', App\Http\Controllers\KategoriController::class);
// Menu CRUD
Route::resource('menus', App\Http\Controllers\MenuController::class);
// Admin User CRUD
Route::resource('admin-users', App\Http\Controllers\AdminUserController::class);
// Pelanggan CRUD
Route::resource('pelanggans', App\Http\Controllers\PelangganController::class);
// Order CRUD
Route::resource('orders', App\Http\Controllers\OrderController::class);
// Order Detail CRUD
Route::resource('order-details', App\Http\Controllers\OrderDetailController::class);
