@extends('layouts.backend.app')

@section('title','Edit URL Shortener')

@push('css')

@endpush

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit URL</h3>
              </div>
            </div>
          </div>
         
          
          <div class="card-body">
          <form method="POST" action="{{route('member.kelola_link.update', ['kelola_link' => $shortlink])}}">
            
                @csrf
                @method('PUT')
              <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">URL ORIGINAL</label>
                          <input type="url" class="form-control" name="original_link" value="{{ $shortlink->original_link }}" readonly>
                        </div>
                      </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">SHORT</label>
                      <input type="url" class="form-control" value="{{ route('member.shorten.link', $shortlink->short_link) }}" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">CUSTOM</label>
                    <input type="text" id="input-email" name="short_link" class="form-control" value="{{ $shortlink->short_link }}">
                    </div>
                    <a href="{{route('member.kelola_link.index') }}" type="button" class="btn btn-sm btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
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