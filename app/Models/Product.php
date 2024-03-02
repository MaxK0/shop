<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'content',
        'preview_image',
        'price', 'count',
        'is_published',
        'category_id'
    ];

    protected $casts = [
        'price' => 'integer',
        'count' => 'integer',
        'is_published' => 'boolean',
        'category_id' => 'integer'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags')->withTimestamps();
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_products')->withTimestamps();
    }

    public function getImageUrlAttribute(): string
    {
        return url('storage/' . $this->preview_image);
    }
}
