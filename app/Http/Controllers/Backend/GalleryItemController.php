<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Gallery $gallery)
    {
        $items = $gallery->items()->orderBy('order')->get();
        return view('backend.cms.galleries.items.index', compact('gallery','items'));
    }

    public function create(Gallery $gallery)
    {
        return view('backend.cms.galleries.items.create', compact('gallery'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'image' => 'required|image',
            'caption' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('gallery_items','public');

        $gallery->items()->create([
            'title' => $data['title'] ?? null,
            'image_path' => $path,
            'caption' => $data['caption'] ?? null,
        ]);

        return redirect()->route('admin.galleries.items.index', $gallery);
    }

    public function edit(Gallery $gallery, GalleryItem $item)
    {
        return view('backend.cms.galleries.items.edit', compact('gallery','item'));
    }

    public function update(Request $request, Gallery $gallery, GalleryItem $item)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'image' => 'nullable|image',
            'caption' => 'nullable|string',
        ]);


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery_items','public');
            // delete old file if exists and different
            if ($item->image_path && $item->image_path !== $path) {
                Storage::disk('public')->delete($item->image_path);
            }
            $item->image_path = $path;
        }

        $item->title = $data['title'] ?? $item->title;
        $item->caption = $data['caption'] ?? $item->caption;
        $item->save();

        return redirect()->route('admin.galleries.items.index', $gallery);
    }

    public function destroy(Gallery $gallery, GalleryItem $item)
    {
        // delete stored image
        if ($item->image_path) {
            Storage::disk('public')->delete($item->image_path);
        }
        $item->delete();
        return redirect()->route('admin.galleries.items.index', $gallery);
    }

    public function reorder(Request $request, Gallery $gallery)
    {
        // optional: implement if needed
    }
}
