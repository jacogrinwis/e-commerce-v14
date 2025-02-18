<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model voor het beheren van adressen
 * Bevat alle adresgegevens van gebruikers in het systeem
 */
class Address extends Model
{
    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',      // ID van de gekoppelde gebruiker
        'name',         // Naam op het adres
        'email',        // E-mailadres
        'phone',        // Telefoonnummer
        'street',       // Straatnaam
        'house_number', // Huisnummer
        'postal_code',  // Postcode
        'city',         // Stad/plaats
        'country',      // Land
        'is_default'    // Indicator voor standaard adres
    ];

    /**
     * De attributen die gecast moeten worden naar specifieke types
     * 
     * @var array
     */
    protected $casts = [
        'is_default' => 'boolean' // Cast is_default naar boolean
    ];

    /**
     * Definieert de relatie met het User model
     * Een adres behoort toe aan één gebruiker
     * 
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
