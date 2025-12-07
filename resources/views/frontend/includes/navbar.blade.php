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
          @guest
          <a class="nav-link d-inline {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Log In</a>
          &nbsp;|&nbsp;
          <a class="nav-link d-inline {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
          @else
          <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="sidebar-link waves-effect waves-dark sidebar-link" style="border:none;background:none;padding:0;margin:0;">
              <i data-feather="log-out" class="feather-icon"></i>
              <span class="hide-menu"><i class="mdi mdi-logout"></i>Log Out</span>
            </button>
          </form>
          @endguest
        </span>
      </div>
    </div>
  </nav>