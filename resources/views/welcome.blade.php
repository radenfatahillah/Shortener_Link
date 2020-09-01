@extends('layouts.frontend.app')

@section('title','Custom URL Shortener')

@push('css')

@endpush

@section('content')
<div class="row justify-content-center mx-0">
  <div class="col-8 col-md-2 pt-6 mb--9 pt-md-0">
    <img src="{{ asset('assets/img/brand/favicon.png') }}" class="mx-auto d-block mt--7 img-fluid img-responsive" style="opacity: 0.3;">
  </div>
</div>
<div class="container mt-sm--4 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-7 mt--6">
        <div class="card bg-secondary border-0 m-0">
          <div class="card-body px-lg-5 py-lg-5">
          <form role="form" action="{{ route('short') }}" method="POST">
            @csrf
              <div class="form-group mb-3">
                <div class="form-group">
                  <label for="url-input" class="form-control-label">URL</label>
                  <div class="input-group mb-3">
                    <input class="form-control" type="url" name="original_link" id="url-input" placeholder="Tempel tautan untuk menyingkat" value="http://" required autocomplete> 
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


    </div>
  </div>

 


@endsection

@push('js')

@endpush