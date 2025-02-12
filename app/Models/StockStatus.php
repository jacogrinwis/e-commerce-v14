<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Database\Factories\StockStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StockStatus extends Model
{
    /** @use HasFactory<\Database\Factories\StockStatusFactory> */
    use HasFactory;
}
