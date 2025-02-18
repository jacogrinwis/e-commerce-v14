<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;

/**
 * Public Routes
 * Openbare Routes
 */
Route::get('/', \App\Livewire\Pages\Home\HomePage::class)->name('home');
Route::get('/about', \App\Livewire\Pages\About\AboutPage::class)->name('about');
Route::get('/contact', \App\Livewire\Pages\Contact\ContactPage::class)->name('contact');

/**
 * Authentication Routes
 * Authenticatie Routes
 */
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

/**
 * Product Routes
 * Product Routes
 */
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ListPage::class)->name('list');
    Route::get('/{category:slug}/{product:slug}', App\Livewire\Pages\Products\DetailPage::class)->name('detail');
});

/**
 * Shopping Cart Routes
 * Winkelwagen Routes
 */
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/shopping-cart', \App\Livewire\Pages\Cart\ShoppingCartPage::class)->name('shopping-cart');
    Route::get('/checkout', \App\Livewire\Pages\Cart\CheckoutPage::class)->name('checkout');
    Route::get('/checkout/confirmation/{order}', \App\Livewire\Pages\Cart\CheckoutConfirmationPage::class)->name('checkout.confirmation');
});

/**
 * User Account Routes (Authenticated)
 * Gebruikersaccount Routes (Ingelogd)
 */
Route::prefix('account')->name('account.')->middleware('auth')->group(function () {
    Route::get('/dashboard', \App\Livewire\Pages\Account\DashboardPage::class)->name('dashboard');
    Route::get('/favorites', \App\Livewire\Pages\Account\FavoritesPage::class)->name('favorites');
    Route::get('/orders', \App\Livewire\Pages\Account\OrdersPage::class)->name('orders');
    Route::get('/reviews', \App\Livewire\Pages\Account\ReviewsPage::class)->name('reviews');
    Route::get('/details', \App\Livewire\Pages\Account\DetailsPage::class)->name('details');
    Route::get('/address-book', \App\Livewire\Pages\Account\AddressBookPage::class)->name('address-book');
});

/**
 * Admin Routes (Admin Role Required)
 * Beheerder Routes (Beheerdersrol Vereist)
 */
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('/', function () {
        return "Admin Sectie";
    })->name('dashboard');
});

/**
 * Editor Routes (Editor Role Required)
 * Editor Routes (Editor Rol Vereist)
 */
Route::prefix('editor')->name('editor.')->middleware(['auth', 'role:EDITOR'])->group(function () {
    Route::get('/', function () {
        return "Editor Sectie";
    })->name('dashboard');
});

/**
 * Lab Routes (Admin Role Required)
 * Lab Routes (Beheerdersrol Vereist)
 */
Route::prefix('lab')->name('lab.')->middleware(['auth', 'role:ADMIN'])->group(function () {
    route::get('stepper', \App\Livewire\Pages\Lab\StepperPage::class)->name('stepper');
});

Route::get('/testmail', function () {
    Mail::to('jacogrinwis@gmail.com')->send(new TestMail());
});
