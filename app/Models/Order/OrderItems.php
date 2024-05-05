<?php

namespace App\Models\Order;

use App\Models\Product\Variation\ProductVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'product_variation_id',
        'order_id'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'product_variation_id' => 'integer',
        'order_id' => 'integer'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function productVariation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class);
    }
}
