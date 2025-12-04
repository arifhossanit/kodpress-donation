<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Models\PageBlock;
use Illuminate\Http\Request;

class PageBlockController extends Controller
{
    public function store(Request $request, PageSection $section)
    {
        $data = $request->validate([
            'type' => 'nullable|string',
            'content' => 'nullable',
            'settings' => 'nullable',
        ]);
        $order = $section->blocks()->max('order') + 1;
        $settings = $request->input('settings');
        if (is_string($settings)) {
            $parsed = json_decode($settings, true);
            $settings = $parsed ?: null;
        }
        $section->blocks()->create([
            'type' => $data['type'] ?? null,
            'content' => $data['content'] ?? null,
            'settings' => $settings,
            'order' => $order,
        ]);
        return redirect()->back();
    }

    public function update(Request $request, PageSection $section, PageBlock $block)
    {
        $data = $request->validate([
            'type' => 'nullable|string',
            'content' => 'nullable',
            'settings' => 'nullable',
        ]);
        $settings = $request->input('settings');
        if (is_string($settings)) {
            $parsed = json_decode($settings, true);
            $settings = $parsed ?: $block->settings;
        }
        $block->type = $data['type'] ?? $block->type;
        $block->content = $data['content'] ?? $block->content;
        $block->settings = $settings ?? $block->settings;
        $block->save();
        return redirect()->back();
    }

    public function destroy(PageSection $section, PageBlock $block)
    {
        $block->delete();
        return redirect()->back();
    }

    public function reorder(Request $request, PageSection $section)
    {
        $ids = $request->input('ids', []);
        foreach ($ids as $index => $id) {
            PageBlock::where('id', $id)->update(['order' => $index]);
        }
        return response()->json(['ok' => true]);
    }
}
