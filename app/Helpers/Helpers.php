<?php

/**
 * Formatteert een prijsbedrag naar het Nederlandse valuta formaat
 * 
 * Deze helper functie zet een numerieke waarde (in centen) om naar een leesbaar prijsformaat:
 * - Voegt het euro symbool (€) toe
 * - Deelt het bedrag door 100 om van centen naar euro's te gaan
 * - Gebruikt een komma als decimaal scheidingsteken
 * - Gebruikt een punt als duizendtal scheidingsteken
 * 
 * Voorbeeld:
 * Input: 150050 (centen)
 * Output: € 1.500,50
 *
 * @param int $price Het bedrag in centen
 * @return string Het geformatteerde prijsbedrag
 */
if (! function_exists('formatPrice')) {
    function formatPrice($price)
    {
        return '€ ' . number_format($price / 100, 2, ',', '.');
    }
}
