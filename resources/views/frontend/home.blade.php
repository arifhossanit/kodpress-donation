@extends('frontend.layouts.app')

@section('title', 'Demo Page')

@section('content')

  <section>
    <div class="carousel-wrapper" style="position:relative;">
      <!-- 6 icon buttons centered above the carousel -->
      <div class="icon-row" style="position:absolute;bottom:50px;left:50%;transform:translateX(-50%);display:flex;gap:12px;z-index:20;">
        <a class="icon-card" href="#">
          <img src="https://img.icons8.com/fluency/48/000000/donation.png" alt="donation">
          <div style="font-size:13px;font-weight:600">DONATION</div>
        </a>
        <a class="icon-card" href="#">
          <img src="https://img.icons8.com/fluency/48/000000/briefcase.png" alt="jobs">
          <div style="font-size:13px;font-weight:600">HELP TO FIND JOBS</div>
        </a>
        <a class="icon-card" href="#">
          <img src="https://img.icons8.com/fluency/48/000000/language.png" alt="language">
          <div style="font-size:13px;font-weight:600">LANGUAGE COURSES</div>
        </a>
        <a class="icon-card" href="#">
          <img src="https://img.icons8.com/fluency/48/000000/gavel.png" alt="legal support">
          <div style="font-size:13px;font-weight:600">LEGAL SUPPORT</div>
        </a>
        <a class="icon-card" href="#">
          <img src="https://img.icons8.com/fluency/48/000000/training.png" alt="professional training">
          <div style="font-size:13px;font-weight:600">PROFESSIONAL TRAINING</div>
        </a>
        <a class="icon-card" href="#">
          <img src="https://img.icons8.com/fluency/48/000000/community.png" alt="social development">
          <div style="font-size:13px;font-weight:600">SOCIAL DEVELOPMENT</div>
        </a>
      </div>

      <!-- existing carousel -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://placehold.co/1400x480" class="d-block w-100" alt="slide1">
          </div>
          <div class="carousel-item">
            <img src="https://placehold.co/1400x480" class="d-block w-100" alt="slide2">
          </div>
          <div class="carousel-item">
            <img src="https://placehold.co/1400x480" class="d-block w-100" alt="slide3">
          </div>
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

@endsection

@push('styles')
  <style>
    .welcome{background:#fff;border-radius:8px;padding:22px}
    .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
    .card{background:#fff;border-radius:8px;padding:14px;box-shadow:0 6px 18px rgba(0,0,0,0.06)}
    .card img{width:100%;height:140px;object-fit:cover;border-radius:6px}
    .card .meta{display:flex;justify-content:space-between;align-items:center;margin-top:10px}
    .btn{background:var(--primary);color:#fff;padding:8px 12px;border-radius:6px;text-decoration:none;display:inline-block}
  </style>
@endpush