
      <!-- -------------------------------------------------------------- -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">Personal</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                >
                  <i data-feather="home" class="feather-icon"></i>
                  <span class="hide-menu"
                    >Dashboard
                    <span class="side-badge badge bg-info">4</span></span
                  >
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="index.html" class="sidebar-link">
                      <i class="mdi mdi-adjust"></i>
                      <span class="hide-menu"> Minimal</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="index2.html" class="sidebar-link">
                      <i class="mdi mdi-adjust"></i>
                      <span class="hide-menu"> Analytical </span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="index3.html" class="sidebar-link">
                      <i class="mdi mdi-adjust"></i>
                      <span class="hide-menu"> Demographical </span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="index4.html" class="sidebar-link">
                      <i class="mdi mdi-adjust"></i>
                      <span class="hide-menu"> Modern </span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                  @guest
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                    <i data-feather="log-in" class="feather-icon"></i>
                    <span class="hide-menu">Login</span>
                  </a>
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                    <i data-feather="user-plus" class="feather-icon"></i>
                    <span class="hide-menu">Register</span>
                  </a>
                  @else
                  <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="sidebar-link waves-effect waves-dark sidebar-link" style="border:none;background:none;padding:0;margin:0;">
                      <i data-feather="log-out" class="feather-icon"></i>
                      <span class="hide-menu">Log Out</span>
                    </button>
                  </form>
                  @endguest
              </li>
              <!-- CMS Menu -->
              <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">CMS</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                >
                  <i data-feather="layers" class="feather-icon"></i>
                  <span class="hide-menu">Content</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link">
                      <i class="mdi mdi-tag"></i>
                      <span class="hide-menu"> Categories</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('admin.posts.index') }}" class="sidebar-link">
                      <i class="mdi mdi-file-document-outline"></i>
                      <span class="hide-menu"> Posts</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('admin.galleries.index') }}" class="sidebar-link">
                      <i class="mdi mdi-image-multiple"></i>
                      <span class="hide-menu"> Galleries</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('admin.banners.index') }}" class="sidebar-link">
                      <i class="mdi mdi-view-carousel"></i>
                      <span class="hide-menu"> Banners / Sliders</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('admin.pages.index') }}" class="sidebar-link">
                      <i class="mdi mdi-file-tree"></i>
                      <span class="hide-menu"> Pages (Builder)</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- Jobs Menu -->
              <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">Recruitment</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                >
                  <i data-feather="briefcase" class="feather-icon"></i>
                  <span class="hide-menu">Jobs</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="{{ route('admin.job_departments.index') }}" class="sidebar-link">
                      <i class="mdi mdi-sitemap"></i>
                      <span class="hide-menu"> Departments</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('admin.job_posts.index') }}" class="sidebar-link">
                      <i class="mdi mdi-briefcase-outline"></i>
                      <span class="hide-menu"> Job Posts</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('admin.job_posts.index') }}#applications" class="sidebar-link">
                      <i class="mdi mdi-file-account"></i>
                      <span class="hide-menu"> Applications</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- packages -->
              <li class="nav-small-cap">
                <i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">Package & Subscriptions</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark"
                  href="{{ route('admin.packages.index') }}"
                  aria-expanded="false"
                >
                  <i data-feather="package" class="feather-icon"></i>
                  <span class="hide-menu">Packages</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark"
                  href="{{ route('admin.subscriptions.index') }}"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-account"></i>
                  <span class="hide-menu">Subscriptions</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- -------------------------------------------------------------- -->