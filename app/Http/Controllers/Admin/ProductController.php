<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('admin.product.create', compact('tags', 'colors', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['preview_image'])) $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);        

        $product = Product::create($data);

        $product->colors()->attach($data['colors'] ?? []);
        $product->tags()->attach($data['tags'] ?? []);

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {       
        $product->description = mb_split('\r\n', $product->description);
        $product->content = mb_split('\r\n', $product->content);

        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        $tags = Tag::all();

        $selectedColorsIds = array_map(fn ($color) => $color['id'], $product->colors->toArray());
        $selectedTagsIds = array_map(fn ($tag) => $tag['id'], $product->tags->toArray());

        return view('admin.product.edit', compact('product', 'categories', 'colors', 'tags', 'selectedColorsIds', 'selectedTagsIds'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        
        if (empty($data['preview_image'])) unset($data['preview_image']);

        $product->update($data);
        $product->tags()->sync($data['tags'] ?? []);
        $product->colors()->sync($data['colors'] ?? []);
        
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();   

        return redirect()->route('admin.products.index');
    }
}
