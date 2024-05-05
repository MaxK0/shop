<?php

namespace App\Models\Product;

use App\Models\Category;
use App\Models\Manufacter;
use App\Models\Product\Variation\ProductVariation;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'active',
        'description', 'main_img',
        'manufacter_id'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function manufacter(): BelongsTo
    {
        return $this->belongsTo(Manufacter::class);
    }

    public function productVariations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
