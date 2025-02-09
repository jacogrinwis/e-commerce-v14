<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Pages\Home\Home::class)->name('home');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ProductList::class)->name('list');
    Route::get('/{product:slug}', App\Livewire\Pages\Products\ProductDetail::class)->name('detail');
});

Route::get('/demo', \App\Livewire\Pages\Demo\DemoList::class)->name('demo');
Route::get('/demo/parent', \App\Livewire\Pages\Demo\DemoParent::class)->name('demo.parent');
Route::get('/demo/aside', \App\Livewire\Pages\Demo\Aside::class)->name('demo.parent');

Route::get('/demo/layout-detail', \App\Livewire\Pages\Demo\LayoutDetail::class)->name('demo.layout');

Route::get('/login', \App\Livewire\Ui\Auth\Login::class)->name('login');
Route::get('/logout', \App\Livewire\Ui\Auth\Logout::class)->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

    Route::middleware('role:' . UserRole::ADMIN->value)->group(function () {
        Route::get('/admin', function () {
            return "Admin Sectie";
        });
    });

    Route::middleware('role:' . UserRole::EDITOR->value)->group(function () {
        Route::get('/editor', function () {
            return "Editor Sectie";
        });
    });
});
