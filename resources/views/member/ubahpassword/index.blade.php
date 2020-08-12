@extends('layouts.backend.app')

@section('title','Ubah Password')

@push('css')
<style>
  .profile-userpic{
    width: 200px;
    height: 200px;
    max-width: 200px;
    max-height: 200px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
  }
  .picca{
    width: 130px;
    height: 130px;
  }
</style>
@endpush

@section('content')

<div class="container-fluid mt-4">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="{{asset ('assets/img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('assets/images/' .Auth::user()->image) }}" class="rounded-circle picca">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">{{ Auth::user()->nama }}</span>
                      <span class="description">{{ Auth::user()->email }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Ubah Password </h3>
                </div>
              </div>
            </div>
            <form action="{{ route('member.ubahpassword.update', Auth::user()->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PATCH">
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Ubah Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Password Lama</label>
                        <input type="password" name="old_password" id="input-username" class="form-control" placeholder="Password Lama">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Password Baru</label>
                        <input type="password" name="password" name="password_confirmation" id="input-email" class="form-control" placeholder="Password Baru">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Konfirmasi Password Baru</label>
                        <input type="password" id="input-email" class="form-control" placeholder="Konfirmasi Password Baru">
                      </div>
                      <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                    </div>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Footer -->
</div>
  
@endsection

@push('js')

@endpush