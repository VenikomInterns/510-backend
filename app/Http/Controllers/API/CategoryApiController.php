<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Models\Product;
use http\Client\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class CategoryApiController
{
    public function index(): Paginator
    {
        return Category::query()->simplePaginate(10);
    } //it's good pratice to wrap API response with JsonResource::collection()

}
