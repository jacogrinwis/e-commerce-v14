<?php

/**
 * Configuratie voor service providers
 * Lijst van alle service providers die geladen moeten worden
 */
return [
    // Core applicatie services
    App\Providers\AppServiceProvider::class,

    // Winkelwagen functionaliteit
    App\Providers\CartServiceProvider::class,
];
