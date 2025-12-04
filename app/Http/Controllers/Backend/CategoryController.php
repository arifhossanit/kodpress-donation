<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('backend.cms.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.cms.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,slug',
            'type' => 'required|string',
        ]);
        Category::create($data);
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('backend.cms.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'type' => 'required|string',
        ]);
        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
