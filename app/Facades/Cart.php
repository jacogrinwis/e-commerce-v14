<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade voor het winkelwagensysteem
 * Deze klasse biedt een statische interface voor alle winkelwagenfunctionaliteiten
 * 
 * Beschikbare methoden:
 * @method static array getItems() Haalt alle items op die zich in de winkelwagen bevinden
 * @method static void addItem() Voegt een nieuw product toe aan de winkelwagen
 * @method static void removeItem() Verwijdert een specifiek product uit de winkelwagen
 * @method static void clear() Maakt de winkelwagen volledig leeg
 */
class Cart extends Facade
{
    /**
     * Geeft de naam terug waarmee de Cart service is geregistreerd in de service container
     * Deze methode is essentieel voor het koppelen van de Facade aan de onderliggende implementatie
     *
     * @return string De identifier waarmee de Cart service is geregistreerd
     */
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
