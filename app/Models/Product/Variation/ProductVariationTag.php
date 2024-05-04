<?php

namespace App\Models\Product\Variation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variation_id',
        'tag_id'
    ];

    protected $casts = [
        'product_variation_id' => 'integer',
        'tag_id' => 'integer'
    ];
}
