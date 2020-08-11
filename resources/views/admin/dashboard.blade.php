@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

<div class="header pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row ">
        <div class="col-xl-3 col-md-6 mt-5">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body ">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Member</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $member->count() }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    {{-- <i class="ni ni-active-40"></i> --}}
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mt-5">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">URL PUBLIC</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $url_public->count() }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    {{-- <i class="ni ni-chart-pie-35"></i> --}}
                    <i class="fas fa-link"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mt-5">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">URL MEMBER</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $url_member->count() }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    {{-- <i class="ni ni-money-coins"></i> --}}
                    <i class="fas fa-link"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mt-5">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">URL ADMIN</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $url_admin->count() }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    {{-- <i class="ni ni-chart-bar-32"></i> --}}
                    <i class="fas fa-link"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
  
            <form role="form" action="{{ route('admin.short.store') }}" method="POST">
              @csrf
                <div class="form-group mb-3">
                  <div class="form-group">
                    <label for="url-input" class="form-control-label">URL</label>
                    <div class="input-group mb-3">
                      <input class="form-control" type="url" name="original_link" id="url-input" placeholder="Tempel tautan untuk menyingkat" required autocomplete> 
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Singkatkan</button>
                      </div>
                    </div>
                  </div>
                </div> 
              </form>
            </div>
          </div>
        </div>

        @foreach($shortLinks as $row)
        <div class="col-lg-12 col-md-7 mt-2">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <small>{{ $row->user->nama}}</small>
              <h3>{{ route('admin.shorten.link', $row->short_link) }}</h3>
              <button type="submit" class="btn btn-primary btn-sm mt-2">Ubah</button>
              <button type="submit" class="btn btn-primary btn-sm mt-2">Hapus</button>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush