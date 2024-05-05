<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
