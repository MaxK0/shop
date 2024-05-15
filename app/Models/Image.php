<?php

namespace App\Models;

use App\Models\Product\Variation\ProductVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'img_link'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class);
    }
}
