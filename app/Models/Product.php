<?php

namespace App\Models;

use Spatie\Tags\Tag;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model voor producten
 * Centraal model voor alle productinformatie in de webshop
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property string $product_number Productnummer
 * @property string $name Productnaam
 * @property string $slug URL-vriendelijke naam
 * @property string $description Productomschrijving
 * @property float $price Prijs
 * @property float|null $discount Kortingspercentage
 * @property string|null $dimensions Afmetingen
 * @property string|null $weight Gewicht
 * @property string|null $cover Hoofdafbeelding
 * @property int $category_id Categorie ID
 * @property int $stock_status_id Voorraadstatus ID
 * 
 * Relaties:
 * @property-read Category $category Productcategorie
 * @property-read Collection<Color> $colors Beschikbare kleuren
 * @property-read Collection<Material> $materials Beschikbare materialen
 * @property-read Collection<ProductImage> $images Productafbeeldingen
 * @property-read Collection<Tag> $tags Product tags
 */
class Product extends Model
{
    use HasFactory;
    use HasTags;

    /**
     * Voorraadstatussen met hun weergavenamen
     */
    const STOCK_STATUS = [
        'in_stock' => 'Op voorraad',
        'low_stock' => 'Bijna uitverkocht',
        'out_of_stock' => 'Uitverkocht',
        'coming_soon' => 'Binnenkort leverbaar'
    ];

    /**
     * Type casting voor attributen
     */
    protected $casts = [
        'stock_status' => 'string'
    ];

    /**
     * Velden die massaal toegewezen kunnen worden
     */
    protected $fillable = [
        'name',         // Productnaam
        'slug',         // URL-vriendelijke naam
        'cover',        // Hoofdafbeelding
        'price',        // Prijs
        'description',  // Beschrijving
        'category_id'   // Categorie ID
    ];

    /**
     * Relatie met categorie
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relatie met kleuren
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    /**
     * Relatie met materialen
     */
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    /**
     * Relatie met tags
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Relatie met productafbeeldingen
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Relatie met beoordelingen
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Berekent de prijs met korting
     */
    public function getDiscountPriceAttribute()
    {
        if ($this->discount > 0) {
            return $this->price * (1 - $this->discount / 100);
        }
        return $this->price;
    }

    /**
     * Berekent de gemiddelde beoordeling
     */
    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    /**
     * Telt het aantal beoordelingen
     */
    public function getRatingCountAttribute()
    {
        return $this->ratings()->count();
    }
}
