<?php

namespace App\Models\Product\Variation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variation_id',
        'color_id'
    ];

    protected $casts = [
        'product_variation_id' => 'integer',
        'color_id' => 'integer'
    ];
}
