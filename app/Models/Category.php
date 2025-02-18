<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model voor productcategorieën
 * Beheert de categorieën waarin producten kunnen worden ingedeeld
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property string $name Naam van de categorie
 * @property string $slug URL-vriendelijke versie van de naam
 * @property \Illuminate\Support\Carbon|null $created_at Aanmaakdatum
 * @property \Illuminate\Support\Carbon|null $updated_at Laatste wijzigingsdatum
 * 
 * Relaties:
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products Gerelateerde producten
 * @property-read int|null $products_count Aantal producten in deze categorie
 * 
 * Beschikbare query methoden:
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 */
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'name', // Naam van de categorie
        'slug'  // URL-vriendelijke versie van de naam
    ];

    /**
     * Definieert de relatie met het Product model
     * Een categorie kan meerdere producten bevatten
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
