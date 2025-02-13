<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', \App\Livewire\Pages\Home\Home::class)->name('home');

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
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:' . UserRole::ADMIN->value])->group(function () {
    Route::get('/', function () {
        return "Admin Sectie";
    })->name('dashboard');
});

// Editor routes
Route::prefix('editor')->name('editor.')->middleware(['auth', 'role:' . UserRole::EDITOR->value])->group(function () {
    Route::get('/', function () {
        return "Editor Sectie";
    })->name('dashboard');
});

// Demo routes
Route::prefix('demo')->name('demo.')->group(function () {
    Route::get('/', \App\Livewire\Pages\Demo\DemoList::class)->name('index');
    Route::get('/parent', \App\Livewire\Pages\Demo\DemoParent::class)->name('parent');
    Route::get('/aside', \App\Livewire\Pages\Demo\Aside::class)->name('aside');
    Route::get('/layout-detail', \App\Livewire\Pages\Demo\LayoutDetail::class)->name('layout');
});

// Beta routes
Route::prefix('beta')->name('beta.')->group(function () {
    Route::get('/products', \App\Livewire\Pages\Beta\ProductList::class)->name('products');
});




// Route::get('/', \App\Livewire\Pages\Home\Home::class)->name('home');

// Route::prefix('products')->name('products.')->group(function () {
//     Route::get('/', App\Livewire\Pages\Products\ListPage::class)->name('list');
//     Route::get('/{product:slug}', App\Livewire\Pages\Products\DetailPage::class)->name('detail');
// });

// Route::get('/demo', \App\Livewire\Pages\Demo\DemoList::class)->name('demo');
// Route::get('/demo/parent', \App\Livewire\Pages\Demo\DemoParent::class)->name('demo.parent');
// Route::get('/demo/aside', \App\Livewire\Pages\Demo\Aside::class)->name('demo.parent');

// Route::get('/demo/layout-detail', \App\Livewire\Pages\Demo\LayoutDetail::class)->name('demo.layout');

// Route::get('/auth/login', \App\Livewire\Ui\Auth\Login::class)->name('auth.login')->middleware('guest');
// Route::get('/auth/logout', \App\Livewire\Ui\Auth\Logout::class)->name('auth.logout');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/user/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
//     Route::get('/user/wishlist', \App\Livewire\Pages\User\Wishlist::class)->name('wishlist');

//     Route::middleware('role:' . UserRole::ADMIN->value)->group(function () {
//         Route::get('/admin', function () {
//             return "Admin Sectie";
//         });
//     });

//     Route::middleware('role:' . UserRole::EDITOR->value)->group(function () {
//         Route::get('/editor', function () {
//             return "Editor Sectie";
//         });
//     });
// });

// Route::get('/beta/products', \App\Livewire\Pages\Beta\ProductList::class)->name('beta.products');
