@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

<div class="header pb-6">
  <div class="container-fluid">
  <h2 class="card-title text-uppercase ml-1 mt-3">Selamat Datang, {{ Auth::user()->nama }}</h2>
    <div class="header-body">
      <!-- Card stats -->
      <div class="row ">
        <div class="col-xl-4 col-md-6 mt-2">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body px-lg-5 py-lg-5">
              <div class="row">
                <div class="col">
                  <h3 class="card-title text-uppercase text-muted mb-0">Total Shortlink</h3>
                  <span class="h1 font-weight-bold mb-0">{{ $shortlink->total() }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    {{-- <i class="ni ni-active-40"></i> --}}
                    <i class="fas fa-users"></i>
                  </div>
                  <hr class="my-4">
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <div class="col-xl-8 col-md-6 mt-2">
        <div class="card border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">
            {{-- <div class="text-center text-muted mb-4">
              <small>Paste URL dibawah ini</small>
            </div> --}}

          <form role="form" action="{{ url('/short') }}" method="POST">
            @csrf
              <div class="form-group mb-3">
                <div class="form-group">
                  <label for="url-input" class="form-control-label">URL</label>
                  <div class="input-group mb-3">
                    <input class="form-control" type="url" name="url" id="url-input" placeholder="Paste url disini"> 
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-primary">Shorten</button>
                    </div>
                  </div>
                </div>
              </div> 
            </form>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
  
@endsection

@push('js')

@endpush