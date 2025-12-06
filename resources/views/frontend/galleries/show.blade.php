@extends('frontend.layouts.app')

@section('title', $gallery->name)

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $gallery->name }}</li>
        </ol>
    </nav>

    <!-- Gallery Header -->
    <div class="gallery-header mb-5">
        <h1 class="mb-3">{{ $gallery->name }}</h1>
        @if($gallery->description)
            <p class="text-muted lead">{{ $gallery->description }}</p>
        @endif
        <div class="gallery-stats">
            <span class="badge bg-primary">{{ $items->total() }} Items</span>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid">
        @forelse($items as $item)
            <div class="gallery-item">
                <div class="gallery-item-image">
                    @if($item->image_path && file_exists(storage_path('app/public/'.$item->image_path)))
                        <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $item->id }}" style="cursor:pointer;">
                    @else
                        <div class="placeholder">
                            <svg width="60" height="60" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="8" fill="#D0D5DD"/>
                                <path d="M14 20L20 14L26 20" stroke="#98A2B3" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="22" cy="16" r="2" fill="#98A2B3"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="gallery-item-info">
                    @if($item->title)
                        <h6 class="item-title">{{ $item->title }}</h6>
                    @endif
                    @if($item->caption)
                        <p class="item-caption">{{ $item->caption }}</p>
                    @endif
                </div>
            </div>

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bg-dark">
                        <div class="modal-header border-secondary">
                            <h5 class="modal-title text-white">{{ $item->title ?? 'Gallery Item' }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            @if($item->image_path && file_exists(storage_path('app/public/'.$item->image_path)))
                                <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}" style="max-width:100%;max-height:600px;">
                            @endif
                        </div>
                        @if($item->caption)
                            <div class="modal-footer border-secondary">
                                <p class="text-muted small">{{ $item->caption }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <p class="mb-0">No images in this gallery yet.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($items->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $items->links() }}
        </div>
    @endif

    <!-- Back Button -->
    <div class="text-center mt-5">
        <a href="{{ route('/') }}" class="btn btn-outline-primary">← Back to Home</a>
    </div>
</div>
@endsection

@push('styles')
<style>
    .gallery-header {
        text-align: center;
        padding: 20px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .gallery-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1f2937;
    }

    .gallery-header .lead {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    .gallery-stats {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .gallery-item {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .gallery-item-image {
        width: 100%;
        height: 240px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .gallery-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-item-image img {
        transform: scale(1.05);
    }

    .gallery-item-image .placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
    }

    .gallery-item-info {
        padding: 16px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .item-title {
        font-size: 16px;
        font-weight: 600;
        margin: 0 0 8px 0;
        color: #1f2937;
        word-break: break-word;
    }

    .item-caption {
        font-size: 13px;
        color: #6b7280;
        margin: 0;
        line-height: 1.5;
        flex-grow: 1;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 12px;
        border: 1px solid #374151;
    }

    .modal-body {
        padding: 30px 20px;
    }

    .modal-body img {
        border-radius: 8px;
    }

    /* Pagination Styles */
    .pagination {
        gap: 8px;
    }

    .pagination .page-link {
        border-radius: 6px;
        border: 1px solid #d1d5db;
        color: #374151;
        text-decoration: none;
    }

    .pagination .page-link:hover {
        background-color: #f3f4f6;
        border-color: #9ca3af;
    }

    .pagination .page-item.active .page-link {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
        }

        .gallery-header h1 {
            font-size: 1.8rem;
        }

        .gallery-item-image {
            height: 180px;
        }
    }

    @media (max-width: 576px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 12px;
        }

        .gallery-header h1 {
            font-size: 1.5rem;
        }

        .gallery-item-image {
            height: 150px;
        }

        .gallery-item-info {
            padding: 12px;
        }

        .item-title {
            font-size: 14px;
        }

        .item-caption {
            font-size: 12px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add lightbox functionality for gallery items
        const galleryItems = document.querySelectorAll('.gallery-item-image img');
        galleryItems.forEach(img => {
            img.style.cursor = 'pointer';
        });
    });
</script>
@endpush
