<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model voor winkelwagen items
 * Beheert de individuele items die gebruikers in hun winkelwagen hebben
 */
class CartItem extends Model
{
    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',    // ID van de gebruiker die het item in de winkelwagen heeft
        'product_id', // ID van het product in de winkelwagen
        'quantity'    // Aantal van het product
    ];

    /**
     * Definieert de relatie met het User model
     * Een winkelwagen item behoort toe aan één gebruiker
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Definieert de relatie met het Product model
     * Een winkelwagen item verwijst naar één product
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
