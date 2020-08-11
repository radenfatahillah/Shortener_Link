<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
      @if (Auth::check() && Auth::user()->role->id == 1)
        <a class="navbar-brand" href="{{route('admin.dashboard')}}">
      @else
        <a class="navbar-brand" href="{{route('member.dashboard')}}">
      @endif
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
              <a class="nav-link {{ Request::is('admin/kelolamember*') ? 'active' : '' }}" href="{{route('admin.kelolamemberindex')}}">
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
              <a class="nav-link {{ Request::is('admin/ubahpassword*') ? 'active' : '' }}" href="{{route('admin.ubahpasswordindex')}}">
                <i class="ni ni-settings-gear-65 text-default"></i>
                <span class="nav-link-text">Ubah Password</span>
              </a>
            </li>
            @else
            <li class="nav-item {{ (request()->routeIs('member.dashboard*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('member.dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('member.shortenerlinkindex*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{route('member.shortenerlinkindex')}}">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Kelola URL Shortener</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('member.profilindex*') ? 'active' : '' }}">
              <a class="nav-link" href="./memberedit">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profil</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('member.ubahpasswordindex*') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('member.ubahpasswordindex')}}">
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