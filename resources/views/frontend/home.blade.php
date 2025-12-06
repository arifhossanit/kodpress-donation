@extends('frontend.layouts.app')

@section('title', 'Demo Page')

@section('content')

  <section>
    <div class="carousel-wrapper" style="position:relative;">
      <!-- 6 icon buttons centered above the carousel -->
      <div class="icon-row" style="position:absolute;bottom:50px;left:50%;transform:translateX(-50%);display:flex;gap:12px;z-index:20;">
        <a  class="icon-card" href="#">
          <img src="{{ asset('frontend/donation.png') }}" alt="donation">
        </a>
        <a class="icon-card" href="#">
          <img src="{{ asset('frontend/jobs.png') }}" alt="jobs">
        </a>
        <a class="icon-card" href="#">
          <img src="{{ asset('frontend/language-course.png') }}" alt="language">
        </a>
        <a class="icon-card" href="#">
          <img src="{{ asset('frontend/legal-support.png') }}" alt="legal support">
        </a>
        <a class="icon-card" href="#">
          <img src="{{ asset('frontend/professional-training.png') }}" alt="professional training">
        </a>
        <a class="icon-card" href="#">
          <img src="{{ asset('frontend/social-development.png') }}" alt="social development">
        </a>
      </div>

      <!-- existing carousel -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          @foreach($banners as $index => $banner)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
          @endforeach
        </div>
        <div class="carousel-inner">
          @foreach($banners as $index => $banner)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset($banner->image_path) }}" class="d-block w-100" alt="slide{{ $index + 1 }}">
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <section class="section container" id="about">
    <div class="welcome">
      <h2>Welcome</h2>
      <p>Welcome to Golden Vision Association. We are a non-governmental organisation committed to building inclusive and supportive societies. Our work spans education, health, and social support to empower communities.</p>
    </div>
  </section>

  <section class="section container" id="projects">
    <h3>Our Impact in Portugal</h3>
    <div class="cards">
      @for($i=0;$i<6;$i++)
      <div class="card">
        <img src="https://picsum.photos/600/400?random={{ $i }}" alt="project">
        <h4 style="margin:8px 0 4px">Pathways of Promise: Building Brighter Futures</h4>
        <div class="meta"><div style="color:var(--muted);font-size:14px">Project · Education</div><div><a class="btn" href="#">Donate Now</a></div></div>
        <p style="margin-top:8px;color:var(--muted);font-size:14px">Short excerpt about the project to engage supporters and show the impact of donations.</p>
      </div>
      @endfor
    </div>
  </section>


  <section class="section container" id="gallery">
    <h3>Our Gallery</h3>
    <div  class="owl-carousel owl-theme">
      @forelse($galleries as $gallery)
        <div class="item card" style="width: 17rem;">
          @if($gallery->items->first())
            <img src="{{ asset('storage/'.$gallery->items->first()->image_path) }}" class="card-img-top" alt="gallery image">
          @else
            <div class="card-img-top" style="background:#e5e7eb;height:200px;display:flex;align-items:center;justify-content:center;">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" rx="8" fill="#D0D5DD"/>
                <path d="M14 20L20 14L26 20" stroke="#98A2B3" stroke-width="2" stroke-linecap="round"/>
                <circle cx="22" cy="16" r="2" fill="#98A2B3"/>
              </svg>
            </div>
          @endif
          <div class="card-body">
            <div class="gallery-count">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                <path d="M1 2C1 1.45 1.45 1 2 1h12c.55 0 1 .45 1 1v10c0 .55-.45 1-1 1H2c-.55 0-1-.45-1-1V2zm2 2v8h10V4H3zm2 5c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
              </svg>
              {{ $gallery->items()->count() }}
            </div>
            <h5 class="card-title">{{ $gallery->name }}</h5>
            <p class="card-text d-inline-block text-truncate" style="max-width: 150px;">{{ $gallery->description }}</p>
            <a href="{{ route('galleries.show', $gallery->slug) }}" class="text-decoration-none">View Gallery →</a>
          </div>
        </div>
      @empty
        <div style="text-align:center;padding:40px;color:var(--muted)">
          <p>No galleries available yet</p>
        </div>
      @endforelse
    </div>
  </section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/libs/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}" />
  <style>
    .welcome{background:#fff;border-radius:8px;padding:22px}
    .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
    .card{background:#fff;border-radius:8px;padding:14px;box-shadow:0 6px 18px rgba(0,0,0,0.06)}
    .card img{width:100%;height:140px;object-fit:cover;border-radius:6px}
    .card .meta{display:flex;justify-content:space-between;align-items:center;margin-top:10px}
    .btn{background:var(--primary);color:#fff;padding:8px 12px;border-radius:6px;text-decoration:none;display:inline-block}
  </style>
@endpush

@push('scripts')
  <script src="{{ asset('assets/libs/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots:true,
        autoWidth:false,
        items:4
      });
    });
  </script>
@endpush