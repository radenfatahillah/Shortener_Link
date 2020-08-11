@extends('layouts.frontend.app')

@section('title','Daftar')

@push('css')

@endpush

@section('content')
<!-- Page content -->
<div class="container mt--9">
    <div class="container mt--9 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h2>Daftar Sekarang</h2>
                </div>
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                      </div>
                      <input class="form-control" placeholder="Nama" type="text" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Konfirmasi Password" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Daftar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
  


@endsection

@push('js')

@endpush