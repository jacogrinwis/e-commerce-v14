<?php

namespace App\Providers;

use App\Services\CartService;
use Illuminate\Support\ServiceProvider;

/**
 * Service Provider voor winkelwagenfunctionaliteit
 * Registreert de CartService als singleton in de applicatie
 */
class CartServiceProvider extends ServiceProvider
{
    /**
     * Registreert de CartService als singleton
     * Zorgt ervoor dat er maar één instantie van de winkelwagen bestaat
     */
    public function register(): void
    {
        $this->app->singleton('cart', function ($app) {
            return new CartService();
        });
    }

    /**
     * Bootstrap services
     * Wordt uitgevoerd na registratie van alle services
     */
    public function boot(): void
    {
        //
    }
}
