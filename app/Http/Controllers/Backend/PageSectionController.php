<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function store(Request $request, Page $page)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'settings' => 'nullable',
            'settings' => 'nullable',
        ]);
        $order = $page->sections()->max('order') + 1;
        $settings = $request->input('settings');
        // accept either array (from inputs) or JSON string
        if (is_string($settings)) {
            $parsed = json_decode($settings, true);
            $settings = $parsed ?: null;
        }
        $page->sections()->create([
            'name' => $data['name'] ?? null,
            'settings' => $settings,
            'order' => $order,
        ]);
        return redirect()->route('admin.pages.edit', $page);
    }

    public function update(Request $request, Page $page, PageSection $section)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'settings' => 'nullable',
        ]);
        $settings = $request->input('settings');
        if (is_string($settings)) {
            $parsed = json_decode($settings, true);
            $settings = $parsed ?: $section->settings;
        }
        $section->name = $data['name'] ?? $section->name;
        $section->settings = $settings ?? $section->settings;
        $section->save();
        return redirect()->route('admin.pages.edit', $page);
    }

    public function destroy(Page $page, PageSection $section)
    {
        $section->delete();
        return redirect()->route('admin.pages.edit', $page);
    }

    public function reorder(Request $request, Page $page)
    {
        $ids = $request->input('ids', []);
        foreach ($ids as $index => $id) {
            PageSection::where('id', $id)->update(['order' => $index]);
        }
        return response()->json(['ok' => true]);
    }
}
