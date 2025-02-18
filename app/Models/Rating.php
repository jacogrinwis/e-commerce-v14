<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model voor productbeoordelingen
 * Beheert alle beoordelingen en recensies van producten
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property int $user_id ID van de gebruiker die de beoordeling heeft gegeven
 * @property int $product_id ID van het beoordeelde product
 * @property int $rating Numerieke waardering (bijvoorbeeld 1-5 sterren)
 * @property string|null $comment Tekstuele recensie
 * @property \Illuminate\Support\Carbon|null $created_at Aanmaakdatum
 * @property \Illuminate\Support\Carbon|null $updated_at Laatste wijzigingsdatum
 * 
 * Relaties:
 * @property-read \App\Models\Product $product Het beoordeelde product
 * @property-read \App\Models\User $user De gebruiker die de beoordeling heeft gegeven
 */
class Rating extends Model
{
    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',    // ID van de gebruiker
        'product_id', // ID van het product
        'rating',     // Numerieke waardering
        'comment'     // Tekstuele recensie
    ];

    /**
     * Definieert de relatie met het User model
     * Een beoordeling behoort toe aan één gebruiker
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Definieert de relatie met het Product model
     * Een beoordeling behoort toe aan één product
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
