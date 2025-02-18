<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * Authenticatie Middleware
 * Controleert of een gebruiker is ingelogd voor beveiligde routes
 */
class Authenticate extends Middleware
{
    /**
     * Bepaalt waar niet-geauthenticeerde gebruikers naar doorgestuurd worden
     * 
     * Als een route authenticatie vereist en de gebruiker is niet ingelogd:
     * - Bij API requests (expectsJson) wordt null teruggegeven
     * - Bij normale requests wordt doorverwezen naar de login pagina
     *
     * @param Request $request Het binnenkomende verzoek
     * @return string|null De URL waar naartoe doorverwezen moet worden
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('auth.login');
    }
}
