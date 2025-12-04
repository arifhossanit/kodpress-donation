<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderByDesc('created_at')->get();
        return view('backend.cms.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('type','post')->get();
        return view('backend.cms.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'category_id' => 'nullable|exists:categories,id',
            'content' => 'nullable',
        ]);
        Post::create($data + ['published' => $request->has('published')]);
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::where('type','post')->get();
        return view('backend.cms.posts.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'category_id' => 'nullable|exists:categories,id',
            'content' => 'nullable',
        ]);
        $post->update($data + ['published' => $request->has('published')]);
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
