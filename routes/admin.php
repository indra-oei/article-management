<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('auth')->middleware('guest:admin')->group(function () {
    Route::get('login', \App\Livewire\Admin\Auth\Login::class)->name('login');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});