<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        return view('backend.cms.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('backend.cms.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:pages,slug',
            'content' => 'nullable',
        ]);
        Page::create($data);
        return redirect()->route('admin.pages.index');
    }

    public function edit(Page $page)
    {
        $page->load('sections.blocks');
        return view('backend.cms.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:pages,slug,' . $page->id,
            'content' => 'nullable',
        ]);
        $page->update($data);
        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index');
    }
}
