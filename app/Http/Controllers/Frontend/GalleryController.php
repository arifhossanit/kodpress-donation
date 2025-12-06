<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->with('items')->firstOrFail();
        $items = $gallery->items()->orderBy('order')->paginate(12);
        
        return view('frontend.galleries.show', compact('gallery', 'items'));
    }
}
