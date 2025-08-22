<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login-submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home
Route::get('/', [MainController::class, 'index'])->name('home');

// Ingressos

Route::get('/ingressos', [MainController::class, 'indexIngressos'])->name('comprarIngressos');

?>