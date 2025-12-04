
  <!-- Top Navbar -->
  <div id="topbar" class="d-flex align-items-center  header-bg">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
          <a class="logo me-auto" href="https://kodepress.com">
            <img alt="Golden Vision Association" src="https://kodepress.com/files/settings/cf295d52-ed24-4e13-a401-9c2e7453c199.png" class="img-fluid" width="230" height="60">
          </a>
      </div>
      <div class="topbar-search d-flex align-items-center">
        <form method="GET" action="https://kodepress.com/pages" class="d-flex align-items-center search-form">
            <button type="submit" class="btn search-btn" aria-label="Search">
                <i class="fa fa-search"></i>
            </button>
            <input type="search" name="search_word" class="form-control search-input" placeholder="Type to start search" maxlength="50" autocomplete="off" required="">
        </form>
      </div>
      <div class="controls d-flex align-items-center">
        <a class="logo ms-3" href="https://kodepress.com">
          <img alt="Helpline" src="https://kodepress.com/files/custom/donate-logo.png" class="img-fluid" width="200" height="60">
        </a>
      </div>
    </div>

    <style>
        .topbar-search .search-form {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.06);
            border: 1px solid rgba(0,0,0,0.09);
        }
        .topbar-search .search-btn {
            background: transparent;
            border: none;
            color: #666;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .topbar-search .search-input {
            border: 0;
            outline: none;
            box-shadow: none;
            border-radius: 10px;
            min-width: 300px;
            font-size: 14px;
            background: transparent;
            margin: 2px;
        }
        #topbar {
            height: 120px;
            background-color: #eeeeee;
        }
        #topbar.topbar-scrolled{
            top: -120px;
        }
        #header{
            top: 120px;
        }
        /* Compact on small screens */
        @media (max-width: 991px) {
            .topbar-search .search-input { min-width: 180px; }
        }
        @media (max-width: 575px) {
            .topbar-search .search-input { display: none; }
            .topbar-search .search-form { padding: 6px; }
        }
    </style>
  </div>