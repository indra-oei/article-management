<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('guest:admin')->group(function () {
    Route::get('login', \App\Livewire\Admin\Auth\Login::class)->name('login');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('dashboard', \App\Livewire\Admin\Dashboard\Dashboard::class)->name('dashboard');
});