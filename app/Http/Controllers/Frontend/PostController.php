<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
            ->with('category')
            ->orderByDesc('published_at')
            ->paginate(12);
        return view('frontend.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('published', true)->firstOrFail();
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('published', true)
            ->limit(3)
            ->get();
        return view('frontend.blog.show', compact('post', 'relatedPosts'));
    }
}
