@extends('layouts.backend.app')

@section('title','Profil')

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

<!-- Page content -->
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
                  <h3 class="mb-0">Ubah Profil </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('member.memberedit.update', Auth::user()->id) }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PATCH">
                <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                            <label class="form-control-label" for="nama">Photo</label><br>
                            <a href="javascript:ambilGambar()">
                                <img id="preview" src="{{ asset('assets/images/' . Auth::user()->image) }}" class="profile-userpic border"/><br/>
                            </a>
                            <input type="file" name="image" id="image" style="display: none;"/><br>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ Auth::user()->nama }}" required autocomplete="nama" autofocus>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="email@example.com" value="{{ Auth::user()->email }}" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">
                      <i class="fa fa-btn fa-sign-in"></i>Update
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
</div>
  
@endsection

@push('js')
<script>
    function ambilGambar() {
        $('#image').click();
    }
    $('#image').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Silakan pilih file gambar format(jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            };
        }
    }
</script>
<script>
  $(document).ready(function(){  
      $("#nama").keypress(function(e){
      var keyCode = e.which; 
      if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 8 && keyCode != 32) {
        e.preventDefault();
      }
    });
  });
</script>
@endpush