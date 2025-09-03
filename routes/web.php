<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIfLogged;
use App\Http\Middleware\CheckIfNotLogged;

// Login
Route::middleware([CheckIfNotLogged::class])->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login-submit');
});

// Home
Route::middleware([CheckIfLogged::class])->group(function() {   
    Route::get('/', [MainController::class, 'index'])->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/comprar-ingressos', [TicketController::class, 'index'])->name('buy-tickets');

    Route::get('/sobre', [AboutController::class, 'index'])->name('about');

    Route::get('/carrinho', [CartController::class, 'index'])->name('cart.index');
    
    Route::post('adicionar/carrinho', [CartController::class, 'addToCart'])->name('cart-add');
});


