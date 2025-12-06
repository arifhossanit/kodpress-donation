<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Models\Category;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('name')->get();
        return view('backend.cms.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.cms.galleries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:galleries,slug',
        ]);
        Gallery::create($data);
        return redirect()->route('admin.galleries.index');
    }

    public function show(Gallery $gallery) {
        return view('backend.cms.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.cms.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:galleries,slug,' . $gallery->id,
        ]);
        $gallery->update($data);
        return redirect()->route('admin.galleries.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index');
    }
}
