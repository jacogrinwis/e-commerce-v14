<?php

namespace App\Enums;

/**
 * Enum voor het definiëren en beheren van gebruikersrollen binnen de applicatie.
 * Deze rollen bepalen de toegangsrechten en mogelijkheden van gebruikers.
 */
enum UserRole: string
{
    /**
     * Beheerder (Administrator) rol
     * Heeft volledige toegang tot alle functionaliteiten van de applicatie.
     * Kan andere gebruikers beheren, instellingen aanpassen en systeemwijzigingen doorvoeren.
     */
    case ADMIN = 'ADMIN';

    /**
     * Editor rol
     * Heeft toegang tot content management functionaliteiten.
     * Kan content aanmaken, bewerken en beheren, maar heeft beperkte systeemtoegang.
     */
    case EDITOR = 'EDITOR';

    /**
     * Standaard gebruikersrol
     * Heeft basis toegang tot de applicatie.
     * Kan eigen profiel beheren en basis functionaliteiten gebruiken.
     */
    case USER = 'USER';

    /**
     * Geeft een overzicht van alle beschikbare rollen terug
     * Wordt gebruikt voor weergave in formulieren en interfaces
     * 
     * @return array Associatieve array met rol-identifiers als sleutel en weergavenamen als waarde
     */
    public static function all(): array
    {
        return [
            self::ADMIN->value => 'Admin',
            self::EDITOR->value => 'Editor',
            self::USER->value => 'User',
        ];
    }
}
