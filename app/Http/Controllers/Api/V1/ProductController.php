<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::all()); // TODO: сделать кэширование
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
