<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->get();
        return view('backend.cms.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.cms.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'title' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('banners','public');
        Banner::create([
            'image_path' => $path,
            'title' => $data['title'] ?? null,
            'link' => $data['link'] ?? null,
            'active' => $request->has('active'),
        ]);
        return redirect()->route('admin.banners.index');
    }

    public function edit(Banner $banner)
    {
        return view('backend.cms.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners','public');
            if ($banner->image_path && $banner->image_path !== $path) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $banner->image_path = $path;
        }
        $banner->title = $data['title'] ?? $banner->title;
        $banner->link = $data['link'] ?? $banner->link;
        $banner->active = $request->has('active');
        $banner->save();
        return redirect()->route('admin.banners.index');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();
        return redirect()->route('admin.banners.index');
    }
}
