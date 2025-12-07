<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light px-5">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">Navbar w/ text</a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('/') ? 'active' : '' }}" aria-current="page" href="{{ route('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admissions.apply') ? 'active' : '' }}" href="{{ route('admissions.apply') }}">Admissions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}" href="{{ route('jobs.index') }}">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}" href="{{ route('posts.index') }}">Blog</a>
          </li>
        </ul>
        <span class="navbar-text">
          Navbar text with an inline element
        </span>
      </div>
    </div>
  </nav>