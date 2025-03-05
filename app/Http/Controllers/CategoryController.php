<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Categories/All', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request ->validate([
            'title' => [
                'required',
                'max:255',
            ],
            'description' => [
                'required',
            ]
        ]);
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function update(Request $request, Category $category)
    {
        $request ->validate([
            'title' => [
                'required',
                'max:255',
            ],
            'description' => [
                'required',
            ],
            
        ]);

        $category->update($request->all());
        return redirect()->route('category.index');
 
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
 
    }

}
