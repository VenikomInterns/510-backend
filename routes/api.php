<?php

use App\Http\Controllers\API\CategoryApiController;
use App\Http\Controllers\API\ProductApiController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories',CategoryApiController::class)->only('index','show');
Route::apiResource('products',ProductApiController::class)->only('index','show');

Route::get('/category/{id}',function ($id){
    return Product::query()->where('category_id','=',$id)->paginate(10);
}); //we should define logic here but only in controllers. Also why on show route we are listing list of products.
//it should be /category/id/products 
