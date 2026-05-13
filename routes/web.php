<?php

use App\Http\Controllers\AluguelController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rotas de Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas Protegidas (Só acessa se houver 'usuario' na session)
Route::middleware([\App\Http\Middleware\CheckLogin::class])->group(function () {
    Route::get('/', function () {
        return redirect()->route('carros.index');
    });
    Route::resource('carros', CarroController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('aluguels', AluguelController::class);
});