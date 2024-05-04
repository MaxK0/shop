<?php

namespace App\Models\Product\Variation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variation_id',
        'material_id'
    ];

    protected $casts = [
        'product_variation_id' => 'integer',
        'material_id' => 'integer'
    ];
}
