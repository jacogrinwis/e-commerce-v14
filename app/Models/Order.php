<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model voor bestellingen
 * Beheert alle bestellingen in het systeem
 */
class Order extends Model
{
    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',          // ID van de klant
        'order_number',     // Uniek bestelnummer
        'status',           // Status van de bestelling
        'shipping_method',  // Verzendmethode
        'payment_method',   // Betaalmethode
        'shipping_address', // Verzendadres (als array opgeslagen)
        'shipping_cost',    // Verzendkosten
        'subtotal',         // Subtotaal van de bestelling
        'discount',         // Toegepaste korting
        'total_amount',     // Totaalbedrag
        'notes'            // Opmerkingen bij de bestelling
    ];

    /**
     * De attributen die naar specifieke types gecast moeten worden
     * 
     * @var array
     */
    protected $casts = [
        'shipping_address' => 'array',  // Cast naar array
        'shipping_cost' => 'float',     // Cast naar float
        'subtotal' => 'float',          // Cast naar float
        'discount' => 'float',          // Cast naar float
        'total_amount' => 'float'       // Cast naar float
    ];

    /**
     * Definieert de relatie met het User model
     * Een bestelling behoort toe aan één gebruiker
     * 
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Definieert de relatie met het OrderItem model
     * Een bestelling kan meerdere orderitems bevatten
     * 
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Accessor voor het omzetten van statuscodes naar leesbare labels
     * 
     * @return string Het leesbare statuslabel
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'In afwachting',
            'processing' => 'In behandeling',
            'completed' => 'Voltooid',
            'cancelled' => 'Geannuleerd',
            default => 'Onbekend'
        };
    }
}
