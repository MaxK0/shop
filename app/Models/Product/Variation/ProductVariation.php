<?php

namespace App\Models\Product\Variation;

use App\Models\Color;
use App\Models\Image;
use App\Models\Material;
use App\Models\Order\OrderItems;
use App\Models\Product\Product;
use App\Models\Size;
use App\Models\Tag;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'price', 'quantity',
        'product_id', 'size_id'
    ];

    protected $casts = [
        'active' => 'boolean',
        'price' => 'integer',
        'quantity' => 'integer',
        'product_id' => 'integer',
        'size_id' => 'integer'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class);
    }

    public function size(): HasOne
    {
        return $this->hasOne(Size::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function wishlist(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }
}
