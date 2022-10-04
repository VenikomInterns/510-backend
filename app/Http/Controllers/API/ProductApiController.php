<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;

class ProductApiController
{
    public function index(): Paginator
    {
        return Product::query()->simplePaginate(10);
    }
    public function show(Product $product): Product
    {
        return $product;
    }
    // Its good practise to wrap API responses with JsonResource::make or JsonResource::collection
}
