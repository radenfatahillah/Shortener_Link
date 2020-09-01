@extends('layouts.frontend.app')

@section('title','Short Link')

@push('css')

@endpush

@section('content')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">

      <div class="col-lg-8 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">
            
            <form role="form" >
              <div class="form-group mb-3">
                <div class="form-group">
                <label for="pilih" class="form-control-label">Sebelumnya : <small>{{ $original_link->original_link}}</small></label>
                <hr>
                  <div class="input-group mb-3">                      
                    <input class="form-control" type="url" value="{{ url($original_link->short_link) }}" id="pilih" readonly> 
                    <div class="input-group-append">
                      <button type="button" onclick="copy_text()" class="btn btn-primary" >Salin</button>
                    </div>
                    <a href="{{ route('home')}}" class="btn btn-warning">Buat Baru</a>
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