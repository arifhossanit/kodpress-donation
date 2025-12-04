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
            return view('frontend.home'); // fallback to existing static view
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
