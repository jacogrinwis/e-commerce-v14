<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model voor productafbeeldingen
 * Beheert alle afbeeldingen die bij producten horen
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property int $product_id ID van het gekoppelde product
 * @property string $url URL/pad naar de afbeelding
 * @property string $alt_text Alternatieve tekst voor de afbeelding
 * @property \Illuminate\Support\Carbon|null $created_at Aanmaakdatum
 * @property \Illuminate\Support\Carbon|null $updated_at Laatste wijzigingsdatum
 * 
 * Beschikbare query methoden:
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newQuery() 
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereUrl($value)
 */
class ProductImage extends Model
{
    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'product_id', // ID van het product
        'url',        // URL/pad naar de afbeelding
        'alt_text'    // Alternatieve tekst voor de afbeelding
    ];

    /**
     * Definieert de relatie met het Product model
     * Een productafbeelding behoort toe aan één product
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
