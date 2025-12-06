<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banners'), $imageName);
            $path = 'uploads/banners/' . $imageName;
        }
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
            $image = $request->file('image');
            $imageName = time() . '-' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banners'), $imageName);
            $path = 'uploads/banners/' . $imageName;
            if ($banner->image_path && file_exists(public_path($banner->image_path))) {
                unlink(public_path($banner->image_path));
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
        if ($banner->image_path && file_exists(public_path($banner->image_path))) {
            unlink(public_path($banner->image_path));
        }
        $banner->delete();
        return redirect()->route('admin.banners.index');
    }
}
