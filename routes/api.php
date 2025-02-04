<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API ROUTE
Route::get('/data-transaksi', [TransaksiController::class, 'GetTransaksi']);
Route::post('/add-transaksi', [TransaksiController::class,'AddTransaksi']);
Route::post('/login', [UserController::class,'login']);
Route::put('/update-transaksi', [TransaksiController::class,'EditTransaksi']);

