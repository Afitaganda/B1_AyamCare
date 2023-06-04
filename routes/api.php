<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\UserController;
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

// USER API


// KANDANG API
Route::post('kandang', [KandangController::class, 'store'])->name('api.kandang.store');

Route::post('auth/register', [UserController::class, 'register'])->name('api.auth.register');
Route::middleware('api-session')->post('auth/login', [UserController::class, 'login'])->name('api.auth.login');
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);
Route::post('auth/me', [AuthController::class, 'me']);
