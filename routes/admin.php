<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->middleware('guest:admin')->group(function () {
    Route::get('login', \App\Livewire\Admin\Auth\Login::class)->name('login');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('dashboard', function () {
        echo "Admin Dashboard";
    })->name('dashboard');
});