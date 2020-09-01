<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{route('home')}}">
          <img src="{{ asset('assets/img/brand/logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          @if (Auth::check() && Auth::user()->role->id == 1)
          <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/kelolamember*') ? 'active' : '' }}" href="{{route('admin.kelola_member.index')}}">
                <i class="fas fa-users text-orange"></i>
                <span class="nav-link-text">Kelola Member</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/kelola_link*') ? 'active' : '' }}" href="{{route('admin.kelola_link.index')}}">
                <i class="fas fa-link text-info"></i>
                <span class="nav-link-text">Kelola URL Shortener</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/short_link_all*') ? 'active' : '' }}" href="{{ route('admin.short_link_all.index') }}">
                <i class="fas fa-link text-primary"></i>
                <span class="nav-link-text">Kelola URL Shortener <small>Member-Public</small></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/adminedit*') ? 'active' : '' }}" href="{{route('admin.adminedit.index')}}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profil</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/ubahpassword*') ? 'active' : '' }}" href="{{route('admin.ubahpassword.index')}}">
                <i class="ni ni-settings-gear-65 text-default"></i>
                <span class="nav-link-text">Ubah Password</span>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link {{ Request::is('member/dashboard*') ? 'active' : '' }}" href="{{route('member.dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('member/kelola_link*') ? 'active' : '' }}" href="{{route('member.kelola_link.index')}}">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Kelola URL Shortener</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('member/memberedit*') ? 'active' : '' }}" href="{{route('member.memberedit.index')}}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profil</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('member/ubahpassword*') ? 'active' : '' }}" href="{{route('member.ubahpassword.index')}}">
                <i class="ni ni-settings-gear-65 text-default"></i>
                <span class="nav-link-text">Ubah Password</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </nav>