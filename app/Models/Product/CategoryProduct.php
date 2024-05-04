<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'category_id' => 'integer'
    ];
}
