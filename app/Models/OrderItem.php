<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model voor bestelregels
 * Beheert de individuele items binnen een bestelling
 */
class OrderItem extends Model
{
    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'order_id',   // ID van de bestelling
        'product_id', // ID van het product
        'quantity',   // Aantal bestelde producten
        'price',      // Prijs per stuk
        'discount'    // Toegepaste korting
    ];

    /**
     * De attributen die naar specifieke types gecast moeten worden
     * 
     * @var array
     */
    protected $casts = [
        'price' => 'float',    // Cast naar float
        'discount' => 'float'  // Cast naar float
    ];

    /**
     * Definieert de relatie met het Order model
     * Een bestelregel behoort toe aan één bestelling
     * 
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Definieert de relatie met het Product model
     * Een bestelregel verwijst naar één product
     * 
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
