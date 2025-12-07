@extends('frontend.layouts.app')

@section('title', 'Blog')

@section('content')
<div class="frontend-page">
    <header class="page-header">
        <h1>Blog</h1>
        <p><a href="/" style="color: white; text-decoration: none;">Home</a> / Blog</p>
    </header>

    <div class="blog-container">
        <div class="blog-grid">
            @forelse($posts as $post)
                <article class="blog-card">
                    @if($post->featured_image)
                    <div class="blog-image">
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}">
                    </div>
                    @endif
                    
                    <div class="blog-content">
                        <div class="blog-meta">
                            @if($post->category)
                                <span class="blog-category">{{ $post->category->name }}</span>
                            @endif
                            <span class="blog-date">{{ $post->published_at?->format('d M, Y') ?? $post->created_at->format('d M, Y') }}</span>
                        </div>
                        
                        <h3 class="blog-title">
                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        
                        <p class="blog-excerpt">
                            {{ $post->excerpt ? Str::limit($post->excerpt, 150) : Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        
                        <a href="{{ route('posts.show', $post->slug) }}" class="read-more-btn">
                            Read More <span>→</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="no-posts">
                    <p>No published posts available yet.</p>
                </div>
            @endforelse
        </div>

        @if($posts->hasPages())
        <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .frontend-page {
        background: #f5f5f5;
        min-height: 100vh;
    }

    .page-header {
        background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%);
        color: white;
        padding: 60px 20px;
        text-align: center;
        margin-bottom: 40px;
    }

    .page-header h1 {
        margin: 0 0 10px;
        font-size: 48px;
        font-weight: 700;
    }

    .page-header p {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }

    .blog-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 60px;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .blog-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    }

    .blog-image {
        width: 100%;
        height: 220px;
        overflow: hidden;
        background: #f0f0f0;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.05);
    }

    .blog-content {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        font-size: 13px;
    }

    .blog-category {
        background: #1b5e20;
        color: white;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 600;
    }

    .blog-date {
        color: #999;
    }

    .blog-title {
        margin: 0 0 12px;
        font-size: 20px;
        font-weight: 600;
        line-height: 1.4;
    }

    .blog-title a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-title a:hover {
        color: #1b5e20;
    }

    .blog-excerpt {
        margin: 0 0 16px;
        color: #666;
        font-size: 15px;
        line-height: 1.6;
        flex-grow: 1;
    }

    .read-more-btn {
        display: inline-block;
        color: #1b5e20;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        align-self: flex-start;
    }

    .read-more-btn:hover {
        color: #2e7d32;
    }

    .read-more-btn span {
        margin-left: 4px;
        transition: transform 0.3s ease;
    }

    .read-more-btn:hover span {
        transform: translateX(4px);
    }

    .no-posts {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    @media(max-width: 768px) {
        .page-header {
            padding: 40px 20px;
        }

        .page-header h1 {
            font-size: 36px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>
@endpush

@endsection
