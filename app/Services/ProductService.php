<?php

namespace App\Services;

use App\Models\Product\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    /**
     * Возвращает пагинированный список товаров с их категориями, производителем и количеством вариаций
     */
    public function index(?int $perPage): LengthAwarePaginator
    {
        return Product::query()->with(['categories', 'manufacter'])
            ->withCount('productVariations')
            ->paginate($perPage ?? 25);
    }
}
