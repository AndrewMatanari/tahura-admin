<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

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
    Route::get('/data-customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/edit-customers->{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/data-customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::patch('/data-customers/{customer}', [CustomerController::class, 'update'])->name('customers.update'); 
    Route::delete('/data-customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/create-customer', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/store-customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/show-customers->{customer}', [CustomerController::class, 'show'])->name('customers.show');
    //user
    Route::get('/data-users', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit-users->{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/data-users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::patch('/data-users/{user}', [UserController::class, 'update'])->name('user.update'); 
    Route::delete('/data-users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-users', [UserController::class, 'store'])->name('user.store');
    Route::get('/show-users->{user}', [UserController::class, 'show'])->name('user.show');

    //pet
    Route::resource('pets', \App\Http\Controllers\PetController::class);
    //reservation
    Route::resource('reservations', \App\Http\Controllers\ReservationController::class);
    //transaction
    Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
    //employee
    Route::resource('employees', \App\Http\Controllers\EmployeesController::class);
    //service
    Route::resource('services', \App\Http\Controllers\ServiceController::class);
    
    

});

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login'); 
    Route::post('/login', [LoginController::class,'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

