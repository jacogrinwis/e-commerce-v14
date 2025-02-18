<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model voor productkleuren
 * Beheert de beschikbare kleuren voor producten in het systeem
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property string $name Naam van de kleur
 * @property string $slug URL-vriendelijke versie van de naam
 * @property string $tailwind_color Tailwind CSS kleurcode
 * @property \Illuminate\Support\Carbon|null $created_at Aanmaakdatum
 * @property \Illuminate\Support\Carbon|null $updated_at Laatste wijzigingsdatum
 * 
 * Relaties:
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products Gerelateerde producten
 * @property-read int|null $products_count Aantal producten met deze kleur
 * 
 * Beschikbare query methoden:
 * @method static \Database\Factories\ColorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereTailwindColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereUpdatedAt($value)
 */
class Color extends Model
{
    /** @use HasFactory<\Database\Factories\ColorFactory> */
    use HasFactory;

    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'name', // Naam van de kleur
        'slug'  // URL-vriendelijke versie van de naam
    ];

    /**
     * Definieert de many-to-many relatie met het Product model
     * Een kleur kan aan meerdere producten gekoppeld zijn
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
