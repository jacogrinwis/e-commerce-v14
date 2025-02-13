<?php

use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', \App\Livewire\Pages\Home\HomePage::class)->name('home');
Route::get('/about', \App\Livewire\Pages\About\AboutPage::class)->name('about');
Route::get('/contact', \App\Livewire\Pages\Contact\ContactPage::class)->name('contact');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', \App\Livewire\Ui\Auth\Login::class)->name('auth.login');
});
Route::get('/auth/logout', \App\Livewire\Ui\Auth\Logout::class)->name('auth.logout');

// Product routes
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ListPage::class)->name('list');
    Route::get('/{product:slug}', App\Livewire\Pages\Products\DetailPage::class)->name('detail');
});

// User routes
Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/wishlist', \App\Livewire\Pages\User\Wishlist::class)->name('wishlist');
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:' . \App\Enums\UserRole::ADMIN->value])->group(function () {
    Route::get('/', function () {
        return "Admin Sectie";
    })->name('dashboard');
});

// Editor routes
Route::prefix('editor')->name('editor.')->middleware(['auth', 'role:' . \App\Enums\UserRole::EDITOR->value])->group(function () {
    Route::get('/', function () {
        return "Editor Sectie";
    })->name('dashboard');
});
