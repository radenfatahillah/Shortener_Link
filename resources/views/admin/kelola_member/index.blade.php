@extends('layouts.backend.app')

@section('title','Kelola Member')

@push('css')

@endpush

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">List Member</h3>
          </div>
          <!-- List Shortener Link -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light text-center">
                <tr>
                  <th scope="col" class="sort" data-sort="name">No</th>
                  <th scope="col" class="sort" data-sort="name">Nama</th>
                  <th scope="col" class="sort" data-sort="budget">Email</th>
                  <th scope="col" class="sort" data-sort="status">Bergabung</th>
                  <th scope="col" class="sort" data-sort="completion">Link Dibuat</th>
                  <th scope="col" class="sort" data-sort="completion">Aksi</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list text-center">
                @foreach($members as $key=> $row)
                <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="{{ asset('assets/images/' .$row->image) }}" class="profile-userpic">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ $row->nama }}</span>
                        </div>
                      </div>
                      
                  </td>
                  <td>
                  {{ $row->email }}
                  </td>
                  <td>
                    {{ date("d M Y", strtotime($row->created_at)) }}
                  </td>
                  <td>
                    {{ $row->shortlink->count() }}
                  </td>
                 
                  <td>
                  <button type="submit" class="btn btn-sm btn-danger icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" type="button" onclick="hapus({{ $row->id }})"><i class="fas fa-trash"></i></button>
                  <form id="hps-{{ $row->id }}" action="{{ route('admin.kelola_member.destroy', ['kelola_member' => $row]) }}" method="POST" style="display: none;" >
                      @csrf
                      @method('DELETE')
                  </form>
                  </td>
                </tr>
                @endforeach 
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                {{ $members->links() }}
              </ul>
            </nav>
          </div>

        </div>
      </div>
    </div>
</div>
  
@endsection

@push('js')

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function hapus(id) {
        swal({
            title: 'Lanjutkan Menghapus?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('hps-'+id).submit();
            } else if (
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Dibatalkan',
                    '',
                    'error'
                )
            }
        })
    }
</script>
@endpush