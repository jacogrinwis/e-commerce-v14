<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware voor rolgebaseerde toegangscontrole
 * Controleert of een ingelogde gebruiker de vereiste rol heeft voor toegang
 */
class RoleMiddleware
{
    /**
     * Verwerkt het binnenkomende verzoek en voert de rolcontrole uit
     * 
     * Deze methode:
     * - Zet de meegegeven rol-string om naar een UserRole enum
     * - Controleert of de gebruiker is ingelogd
     * - Vergelijkt de rol van de gebruiker met de vereiste rol
     * - Staat toegang toe of blokkeert deze op basis van de controle
     *
     * @param Request $request Het binnenkomende verzoek
     * @param Closure $next De volgende middleware in de keten
     * @param string $role De vereiste rol (ADMIN, EDITOR, USER)
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roleEnum = UserRole::from($role);

        if (Auth::check() && Auth::user()->role === $roleEnum) {
            return $next($request);
        }

        abort(403, 'Ongeautoriseerde toegang.');
    }
}
