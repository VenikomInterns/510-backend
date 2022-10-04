<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        //you dont need to call ->all() after ->get()
        $categories = Category::query()->get()->all();
        return Inertia::render('Category/Index', compact('categories'));
    } 

    public function show(Category $category): Response
    {
        return Inertia::render('Category/Show', compact('category'));
    } //excellent

    public function edit(Category $category): Response
    {
        return Inertia::render('Category/Edit', compact('category'));
    }//excellent

    public function update(Category $category, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $category->fill($validated);
        $category->save();
        return redirect()->back();
    }//excellent

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete(); //what if this category has products?
        return redirect()->route('categories.index');
    }

    public function create(): Response
    {
        return Inertia::render('Category/Create');
    }//excellent

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        Category::query()->create($validated);
        return redirect()->back();
    }//excellent

}
