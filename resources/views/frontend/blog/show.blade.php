@extends('frontend.layouts.app')

@section('title', $post->title)

@section('content')
<div class="frontend-page">
    <header class="page-header">
        <h1>{{ $post->title }}</h1>
        <p><a href="/" style="color: white; text-decoration: none;">Home</a> / <a href="{{ route('posts.index') }}" style="color: white; text-decoration: none;">Blog</a> / {{ $post->title }}</p>
    </header>

    <div class="blog-container">
        <div class="row">
            <div class="col-md-8">
                <article class="blog-detail">
                    @if($post->featured_image)
                    <div class="featured-image">
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}">
                    </div>
                    @endif

                    <div class="post-meta">
                        @if($post->category)
                            <span class="category-badge">{{ $post->category->name }}</span>
                        @endif
                        <span class="post-date">{{ $post->published_at?->format('F d, Y') ?? $post->created_at->format('F d, Y') }}</span>
                    </div>

                    <h1>{{ $post->title }}</h1>

                    <div class="post-content">
                        {!! $post->content !!}
                    </div>

                    <div class="post-footer">
                        <a href="{{ route('posts.index') }}" class="back-btn">← Back to Blog</a>
                    </div>
                </article>
            </div>

            <div class="col-md-4">
                @if($relatedPosts->count() > 0)
                <div class="sidebar-widget">
                    <h3>Related Posts</h3>
                    <div class="related-posts">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="related-post-item">
                            @if($relatedPost->featured_image)
                            <div class="related-image">
                                <img src="{{ asset($relatedPost->featured_image) }}" alt="{{ $relatedPost->title }}">
                            </div>
                            @endif
                            <div class="related-content">
                                <h5><a href="{{ route('posts.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a></h5>
                                <span class="related-date">{{ $relatedPost->published_at?->format('M d, Y') ?? $relatedPost->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
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

    .page-header a {
        color: inherit;
        text-decoration: none;
    }

    .page-header a:hover {
        text-decoration: underline;
    }

    .blog-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 60px;
    }

    .blog-detail {
        background: white;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .featured-image {
        width: 100%;
        height: 400px;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 30px;
        background: #f0f0f0;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .post-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
        font-size: 14px;
    }

    .category-badge {
        background: #1b5e20;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
    }

    .post-date {
        color: #999;
    }

    .blog-detail h1 {
        margin: 0 0 24px;
        font-size: 36px;
        font-weight: 700;
        line-height: 1.3;
        color: #333;
    }

    .post-content {
        font-size: 16px;
        line-height: 1.8;
        color: #555;
        margin-bottom: 30px;
    }

    .post-content p {
        margin-bottom: 16px;
    }

    .post-content h2 {
        margin: 30px 0 16px;
        font-size: 24px;
        color: #333;
    }

    .post-content h3 {
        margin: 24px 0 12px;
        font-size: 20px;
        color: #333;
    }

    .post-content ul,
    .post-content ol {
        margin: 16px 0 16px 24px;
    }

    .post-content li {
        margin-bottom: 8px;
    }

    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }

    .post-footer {
        padding-top: 24px;
        border-top: 1px solid #e0e0e0;
        margin-top: 30px;
    }

    .back-btn {
        display: inline-block;
        color: #1b5e20;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        color: #2e7d32;
        transform: translateX(-4px);
    }

    .sidebar-widget {
        background: white;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar-widget h3 {
        margin: 0 0 20px;
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .related-posts {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .related-post-item {
        display: flex;
        gap: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e0e0e0;
        transition: transform 0.3s ease;
    }

    .related-post-item:last-child {
        border-bottom: none;
    }

    .related-post-item:hover {
        transform: translateX(4px);
    }

    .related-image {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        overflow: hidden;
        border-radius: 6px;
        background: #f0f0f0;
    }

    .related-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-content {
        flex-grow: 1;
    }

    .related-content h5 {
        margin: 0 0 6px;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.3;
    }

    .related-content h5 a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .related-content h5 a:hover {
        color: #1b5e20;
    }

    .related-date {
        font-size: 12px;
        color: #999;
    }

    @media(max-width: 768px) {
        .page-header {
            padding: 40px 20px;
        }

        .page-header h1 {
            font-size: 32px;
        }

        .blog-detail {
            padding: 24px;
        }

        .featured-image {
            height: 250px;
            margin-bottom: 20px;
        }

        .blog-detail h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .post-content {
            font-size: 15px;
        }

        .col-md-8,
        .col-md-4 {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>
@endpush

@endsection
