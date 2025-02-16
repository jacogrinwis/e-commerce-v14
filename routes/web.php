<?php

use App\Mail\TestMail;
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
    Route::get('/shopping-cart', \App\Livewire\Pages\Cart\ShoppingCartPage::class)->name('shopping-cart');
    Route::get('/checkout', \App\Livewire\Pages\Cart\CheckoutPage::class)->name('checkout');
    Route::get('/checkout/confirmation/{order}', \App\Livewire\Pages\Cart\CheckoutConfirmationPage::class)->name('checkout.confirmation');
});

// Account routes
Route::prefix('account')->name('account.')->middleware('auth')->group(function () {
    Route::get('/dashboard', \App\Livewire\Pages\Account\DashboardPage::class)->name('dashboard');
    Route::get('/favorites', \App\Livewire\Pages\Account\FavoritesPage::class)->name('favorites');
    Route::get('/orders', \App\Livewire\Pages\Account\OrdersPage::class)->name('orders');
    Route::get('/reviews', \App\Livewire\Pages\Account\ReviewsPage::class)->name('reviews');
    Route::get('/details', \App\Livewire\Pages\Account\DetailsPage::class)->name('details');
    Route::get('/address-book', \App\Livewire\Pages\Account\AddressBookPage::class)->name('address-book');
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

// Route::get('/testmail', function () {
//     Mail::to('jacogrinwis@gmail.com')
//         ->send(new TestMail());
//     return "Mail sent!";
// });

Route::get('/testmail', function () {
    dd(config('services.resend.key'));
    Mail::to('jacogrinwis@gmail.com')->send(new TestMail());
});
