<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiketControllerController;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    //customer
    Route::get('/data-transaksi', [CustomerController::class, 'index'])->name('transaksi.index');
    Route::get('/edit-transaksi->{customer}', [CustomerController::class, 'edit'])->name('transaksi.edit');
    Route::put('/data-transaksi/{customer}', [CustomerController::class, 'update'])->name('transaksi.update');
    Route::patch('/data-transaksi/{customer}', [CustomerController::class, 'update'])->name('transaksi.update'); 
    Route::delete('/data-transaksi/{customer}', [CustomerController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/create-customer', [CustomerController::class, 'create'])->name('transaksi.create');
    Route::post('/store-transaksi', [CustomerController::class, 'store'])->name('transaksi.store');
    Route::get('/show-transaksi->{customer}', [CustomerController::class, 'show'])->name('transaksi.show');
    //user
    Route::get('/data-users', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit-users->{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/data-users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::patch('/data-users/{user}', [UserController::class, 'update'])->name('user.update'); 
    Route::delete('/data-users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-users', [UserController::class, 'store'])->name('user.store');
    Route::get('/show-users->{user}', [UserController::class, 'show'])->name('user.show');

    //transaksi
    Route::get('/data-transaksi', [\App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/edit-transaksi->{transaksi}', [\App\Http\Controllers\TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/data-transaksi/{transaksi}', [\App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
    Route::patch('/data-transaksi/{transaksi}', [\App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/data-transaksi/{transaksi}', [\App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/create-transaksi', [\App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/store-transaksi', [\App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/show-transaksi->{transaksi}', [\App\Http\Controllers\TransaksiController::class, 'show'])->name('transaksi.show');
    //produk
    Route::get('/data-produk', [\App\Http\Controllers\ProdukController::class, 'index'])->name('produks.index');
    Route::get('/edit-produk->{produk}', [\App\Http\Controllers\ProdukController::class, 'edit'])->name('produks.edit');
    Route::put('/data-produk/{produk}', [\App\Http\Controllers\ProdukController::class, 'update'])->name('produks.update');
    Route::patch('/data-produk/{produk}', [\App\Http\Controllers\ProdukController::class, 'update'])->name('produks.update');
    Route::delete('/data-produk/{produk}', [\App\Http\Controllers\ProdukController::class, 'destroy'])->name('produks.destroy');
    Route::get('/create-produk', [\App\Http\Controllers\ProdukController::class, 'create'])->name('produks.create');
    Route::post('/store-produk', [\App\Http\Controllers\ProdukController::class, 'store'])->name('produks.store');
    Route::get('/show-produk->{produk}', [\App\Http\Controllers\ProdukController::class, 'show'])->name('produks.show');
    //service
    Route::get('/data-tiket', [\App\Http\Controllers\TiketController::class, 'index'])->name('tiket.index');
    Route::get('/edit-tiket->{tiket}', [\App\Http\Controllers\TiketController::class, 'edit'])->name('tiket.edit');
    Route::put('/data-tiket/{tiket}', [\App\Http\Controllers\TiketController::class, 'update'])->name('tiket.update');
    Route::patch('/data-tiket/{tiket}', [\App\Http\Controllers\TiketController::class, 'update'])->name('tiket.update');
    Route::delete('/data-tiket/{tiket}', [\App\Http\Controllers\TiketController::class, 'destroy'])->name('tiket.destroy');
    Route::get('/create-tiket', [\App\Http\Controllers\TiketController::class, 'create'])->name('tiket.create');
    Route::post('/store-tiket', [\App\Http\Controllers\TiketController::class, 'store'])->name('tiket.store');
    Route::get('/show-tiket->{tiket}', [\App\Http\Controllers\TiketController::class, 'show'])->name('tiket.show');
    
    

});

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login'); 
    Route::post('/login', [LoginController::class,'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

