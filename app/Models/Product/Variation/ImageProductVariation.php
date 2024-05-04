<?php

namespace App\Models\Product\Variation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variation_id',
        'image_id'
    ];

    protected $casts = [
        'product_variation_id' => 'integer',
        'image_id' => 'integer'
    ];
}
