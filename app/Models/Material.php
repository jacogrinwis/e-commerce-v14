<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model voor productmaterialen
 * Beheert de beschikbare materialen voor producten in het systeem
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property string $name Naam van het materiaal
 * @property string $slug URL-vriendelijke versie van de naam
 * @property \Illuminate\Support\Carbon|null $created_at Aanmaakdatum
 * @property \Illuminate\Support\Carbon|null $updated_at Laatste wijzigingsdatum
 * 
 * Relaties:
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products Gerelateerde producten
 * @property-read int|null $products_count Aantal producten met dit materiaal
 * 
 * Beschikbare query methoden:
 * @method static \Database\Factories\MaterialFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Material whereUpdatedAt($value)
 */
class Material extends Model
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;

    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'name', // Naam van het materiaal
        'slug'  // URL-vriendelijke versie van de naam
    ];

    /**
     * Definieert de many-to-many relatie met het Product model
     * Een materiaal kan aan meerdere producten gekoppeld zijn
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
