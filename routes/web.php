<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;

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
    Route::resource('customers', CustomerController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('pets', \App\Http\Controllers\PetController::class);
    Route::resource('reservations', \App\Http\Controllers\ReservationController::class);
    Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
    Route::resource('employees', \App\Http\Controllers\EmployeesController::class);
    Route::resource('services', \App\Http\Controllers\ServiceController::class);
    
    

});

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login'); 
    Route::post('/login', [LoginController::class,'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

