<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Faker\Provider\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;


use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use function Termwind\render;


class ProductController extends Controller
{
    public function index(): Response
    {
        $products = Product::query()->get()->all(); //you dont need to call ->all() after ->get()
        return Inertia::render('Product/Index', compact('products'));
    }//what if we have thousands of products?

    public function create(): Response
    {
        $categories = Category::query()->get();
        return Inertia::render('Product/Create', compact('categories'));
    }//excellent

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }//excellent 

    public function show(Product $product): Response
    {
        return Inertia::render('Product/Show', compact('product'));
    }//excellent

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required', //what if price given is not a number 
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp', //good
            'category_id' => 'required' //what if user provides non existing category_id or string?
        ]);

        unset($validated['image']); //ok

        $product = new Product($validated); //ok

        if ($request->hasFile('image')) { //good
            $image = $request->file('image'); /good
            $filename = time() . '.' . $image->getClientOriginalExtension(); //good
            $filename = "public/upload_" . $filename; //good
            $img = \Intervention\Image\Facades\Image::make($image)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();
            Storage::put($filename, $img);
            $product->image = $filename; //good
        }
        //what if category couldn't be found, because we dont validate it. Possible null pointer exception
        
        Category::query()->find($validated['category_id'])->products()->create([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'image' => $product->image
        ]);//why creating Product object and then fill associative array again when we can ->products()->save($product)

        return redirect()->back();
    }


    public function edit(Product $product): Response
    {
        $categoryName = $product->category()->get()->first()->name;

        return Inertia::render('Product/Edit', compact('product', 'categoryName'));
    } //ok 

    public function update(Product $product,Request $request, ): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required', //what if non integer
            'image' => 'nullable|exclude_if:image,null|image|mimes:jpeg,png,jpg,svg,webp',
            'category_id' => 'required' //what if doesn't exists
        ]);

        $category_id=$validated['category_id'];
        unset($validated['category_id']);


        if ($request->hasFile('image')) {

            Storage::delete($product->getRawOriginal('image'));

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $filename = "public/upload_" . $filename;
            $img = \Intervention\Image\Facades\Image::make($image)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();
            Storage::put($filename, $img);
            $validated['image']=$filename;
        }//ok
        $product->fill($validated);
        $product->category()->associate($category_id);
        $product->save();
        return redirect::route('products.index');
    } //ok 

}
