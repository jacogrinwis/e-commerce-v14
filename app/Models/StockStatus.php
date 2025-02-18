<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model voor voorraadstatussen
 * Beheert de verschillende voorraadstatussen van producten
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property string $name Naam van de voorraadstatus
 * @property string $code Interne code voor de status
 * @property \Illuminate\Support\Carbon|null $created_at Aanmaakdatum
 * @property \Illuminate\Support\Carbon|null $updated_at Laatste wijzigingsdatum
 * 
 * Beschikbare query methoden:
 * @method static \Database\Factories\StockStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereUpdatedAt($value)
 */
class StockStatus extends Model
{
    /** @use HasFactory<\Database\Factories\StockStatusFactory> */
    use HasFactory;

    /**
     * De velden die massaal toegewezen kunnen worden
     * 
     * @var array
     */
    protected $fillable = [
        'name', // Naam van de voorraadstatus
        'code'  // Interne code voor de status
    ];

    /**
     * Definieert de relatie met het Product model
     * Een voorraadstatus kan aan meerdere producten gekoppeld zijn
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
