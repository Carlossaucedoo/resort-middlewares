<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

// Rutas públicas (sin restricciones)
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

Route::middleware('throttle:10,1')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// Rutas privadas (requieren pasar CheckAuth)
Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/panel', [PageController::class, 'panel'])->name('panel');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Casino (requiere CheckAuth y CheckAge)
    Route::middleware([CheckAge::class])->group(function () {
        Route::get('/casino', [PageController::class, 'casino'])->name('casino');
    });

    // Oficina de dirección (requiere CheckAuth y CheckAdmin)
    Route::middleware([CheckAdmin::class])->group(function () {
        Route::get('/admin', [PageController::class, 'admin'])->name('admin');
    });
});
