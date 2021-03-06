@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

<div class="header pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row col-lg-12 col-md-7">
        <div class="col-xl-3 col-md-6 mt-5">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body ">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">URL Member</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $shortlink->count() }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="fas fa-users"></i>
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
  
            <form role="form" action="{{ route('member.kelola_link.store') }}" method="POST">
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
              <small class="text-muted">Dibuat : {{ $row->created_at->diffForHumans() }}</small>
              <div class="input-group mb-3">                      
                <input class="form-control" type="url" value="{{ url($row->short_link) }}" id="pilih" readonly> 
                <div class="input-group-append">
                  <a href="{{ route('member.kelola_link.edit', $row ['id']) }}" type="button" class="btn btn-primary">Edit</a>
                  <button type="button" onclick="copy_text()" class="btn btn-primary" >Salin</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>

@endsection

@push('js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

<script type="text/javascript">
  function copy_text() {
    document.getElementById("pilih").select();
    document.execCommand("copy");
      swal({
        // position: 'top-end',
        // icon: 'success',
        type: 'success',
        title: 'Berhasil disalin',
        // text: "Berhasil disalin",
        showConfirmButton: false,
        timer: 2500
      })   
  }
</script>
@endpush