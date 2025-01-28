<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Pages\Home\Home::class)->name('home');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', App\Livewire\Pages\Products\ProductList::class)->name('list');
    Route::get('/{product:slug}', App\Livewire\Pages\Products\ProductDetail::class)->name('detail');
});
