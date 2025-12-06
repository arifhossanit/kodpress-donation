<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Render the home page using the Page model (slug = 'home') if available
    public function home()
    {
        $page = Page::with('sections.blocks')->where('slug', 'home')->first();
        if (!$page) {
            $galleries = \App\Models\Gallery::with('items')->get();
            $banners = \App\Models\Banner::where('active', true)->orderBy('order')->get();
            return view('frontend.home', compact('banners', 'galleries')); // fallback to existing static view
        }
        return view('frontend.page', compact('page'));
    }

    // Generic page by slug
    public function show($slug)
    {
        $page = Page::with('sections.blocks')->where('slug', $slug)->firstOrFail();
        return view('frontend.page', compact('page'));
    }
}
