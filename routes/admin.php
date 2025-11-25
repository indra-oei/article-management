<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function() {
    return redirect()->route('admin.dashboard');
});

Route::prefix('auth')->middleware('guest:admin')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('category', [CategoryController::class, 'index'])->name('category');

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});