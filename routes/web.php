<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MasterImageController;
use App\Http\Controllers\Admin\MenuController;

// Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');

// Auth
Auth::routes();

// Admin (dengan middleware auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sliders', SliderController::class);
    Route::resource('master-images', MasterImageController::class);
    Route::resource('menus', MenuController::class);
});