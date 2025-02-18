<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

/**
 * Applicatie bootstrapper
 * Configureert de basis van de Laravel applicatie
 */
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // Definieert de route bestanden
        web: __DIR__ . '/../routes/web.php',      // Web routes
        commands: __DIR__ . '/../routes/console.php', // Console commands
        health: '/up',                            // Health check endpoint
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registreert middleware aliases
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,  // Rol-gebaseerde authenticatie
            'auth' => \App\Http\Middleware\Authenticate::class,    // Basis authenticatie
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exceptie handling configuratie
    })->create();
