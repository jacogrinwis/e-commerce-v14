<?php

use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', \App\Livewire\Pages\Home\HomePage::class)->name('home');
Route::get('/about', \App\Livewire\Pages\About\AboutPage::class)->name('about');
Route::get('/contact', \App\Livewire\Pages\Contact\ContactPage::class)->name('contact');

// Auth routes
// Route::middleware('guest')->group(function () {
//     Route::get('/auth/login', \App\Livewire\Ui\Auth\Login::class)->name('auth.login');
// });
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', \App\Livewire\Pages\Auth\LoginPage::class)->name('auth.login');
    Route::get('/auth/register', \App\Livewire\Pages\Auth\RegisterPage::class)->name('auth.register');
});
Route::get('/auth/logout', \App\Livewire\Ui\Auth\Logout::class)->name('auth.logout');

Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect(route('auth.login'));
})->name('logout');

// Product routes
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ListPage::class)->name('list');
    Route::get('/{category:slug}/{product:slug}', App\Livewire\Pages\Products\DetailPage::class)->name('detail');
});

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/shopping=cart', \App\Livewire\Pages\Cart\ShoppingCartPage::class)->name('shopping-cart');
});

// User routes
// Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
//     Route::get('/dashboard', \App\Livewire\Pages\User\DashboardPage::class)->name('dashboard');
//     Route::get('/favorites', \App\Livewire\Pages\User\FavoritesPage::class)->name('favorites');
//     Route::get('/orders', \App\Livewire\Pages\User\OrdersPage::class)->name('orders');
//     Route::get('/reviews', \App\Livewire\Pages\User\ReviewsPage::class)->name('reviews');
//     Route::get('/details', \App\Livewire\Pages\User\DetailsPage::class)->name('details');
// });

// Account routes
Route::prefix('account')->name('account.')->middleware('auth')->group(function () {
    Route::get('/dashboard', \App\Livewire\Pages\Account\DashboardPage::class)->name('dashboard');
    Route::get('/favorites', \App\Livewire\Pages\Account\FavoritesPage::class)->name('favorites');
    Route::get('/orders', \App\Livewire\Pages\Account\OrdersPage::class)->name('orders');
    Route::get('/reviews', \App\Livewire\Pages\Account\ReviewsPage::class)->name('reviews');
    Route::get('/details', \App\Livewire\Pages\Account\DetailsPage::class)->name('details');
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
