@extends('layouts.frontend.app')

@section('title','Custom URL Shortener')

@push('css')

@endpush

@section('content')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">

      <div class="col-lg-8 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">

          <form role="form" action="{{ route('short') }}" method="POST">
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
    </div>
  </div>
@endsection

@push('js')

@endpush