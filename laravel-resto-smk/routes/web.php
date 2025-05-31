<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminLoginController; // Import AdminLoginController
use App\Http\Controllers\CategoryController; // Import CategoryController
use App\Http\Controllers\PelangganController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontController::class, 'index']);

Route::prefix('admin')->middleware(['auth', 'checkUserLevel:admin'])->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::resource('kategori', CategoryController::class);
    Route::resource('orders', 'OrderController');
    Route::resource('users', 'UserController');
    Route::resource('pelanggan', PelangganController::class);
    Route::patch('pelanggan/{id}/update-status', [PelangganController::class, 'updateStatus'])->name('pelanggan.updateStatus');
});
Route::get('/show/{id}', [FrontController::class, 'show']);
Route::get('/register', [FrontController::class, 'register'])->name('register');
Route::post('/register', [FrontController::class, 'store'])->name('register.post');
Route::get('/login', [FrontController::class, 'showLoginForm'])->name('login');
Route::post('/login', [FrontController::class, 'login'])->name('login');
Route::get('/logout', [FrontController::class, 'logout'])->name('logout');
