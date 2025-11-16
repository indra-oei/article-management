<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('auth')->middleware('guest:admin')->group(function () {
    Route::get('login', \App\Livewire\Admin\Auth\Login::class)->name('login');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('category', [CategoryController::class, 'index'])->name('category');
});