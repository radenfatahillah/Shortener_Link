<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="https://diskominfo.kalbarprov.go.id/" target="_blank">
        <img src="{{ asset('assets/img/brand/logo.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="{{ asset('assets/img/brand/blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        {{-- <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="dashboard.html" class="nav-link">
              <span class="nav-link-inner--text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="login.html" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="register.html" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
        </ul> --}}
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>

          @guest
                <li class="nav-item d-none d-lg-block ml-lg-4">
                  <a href="{{ route('login') }}" class="btn btn-neutral">
                    <span class="nav-link-inner--text">Login</span>
                  </a>
                </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                      <a href="{{ route('register') }}" class="nav-link">
                        <span class="nav-link-inner--text">Daftar</span>
                      </a>
                    </li>
                    @endif
                @else
                @if (Auth::check() && Auth::user()->role->id == 1)
                  <li class="nav-item d-none d-lg-block ml-lg-4">
                      <a href="{{ route('admin.dashboard') }}" class="btn btn-neutral">
                        <span class="nav-link-inner--text">Dashboard</span>
                      </a>
                  </li>
                  @else
                  <li class="nav-item d-none d-lg-block ml-lg-4">
                      <a href="{{ route('member.dashboard') }}" class="btn btn-neutral">
                        <span class="nav-link-inner--text">Dashboard</span>
                      </a>
                  </li>
                  @endif
                  <li class="nav-item">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"  class="nav-link logout "> <span class="d-none d-sm-inline">Keluar</span></a>
                    <form action="{{ route('logout')}}" id="logout-form" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                  @endguest
        </ul>
      </div>
    </div>
  </nav>