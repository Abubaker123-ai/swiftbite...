<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Public routes
Route::get('/',        [PageController::class, 'home'])->name('home');
Route::get('/about',   [PageController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact',[ContactController::class, 'store'])->name('contact.store');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/',         [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login',   [AdminController::class, 'login'])->name('admin.login.post');
    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::delete('/messages/{message}', [AdminController::class, 'destroy'])->name('admin.messages.destroy');
    Route::post('/logout',  [AdminController::class, 'logout'])->name('admin.logout');
});
