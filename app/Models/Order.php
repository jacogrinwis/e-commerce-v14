<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'shipping_method',
        'payment_method',
        'shipping_address',
        'shipping_cost',
        'subtotal',
        'discount',
        'total_amount',
        'notes'
    ];

    protected $casts = [
        'shipping_address' => 'array',
        'shipping_cost' => 'float',
        'subtotal' => 'float',
        'discount' => 'float',
        'total_amount' => 'float'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'In afwachting',
            'processing' => 'In behandeling',
            'completed' => 'Voltooid',
            'cancelled' => 'Geannuleerd',
            default => 'Onbekend'
        };
    }
}
