@extends('layouts.backend.app')

@section('title','List Semua Short Link')

@push('css')

@endpush

@section('content')

<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
        <h3 class="mb-0">List Short Link Member dan Public</h3>
          
        </div>
        <!-- List URL Shortener -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light text-center">
              <tr>
                <th scope="col" class="sort" data-sort="budget">No</th>
                <th scope="col" class="sort" data-sort="budget">Original Link</th>
                <th scope="col" class="sort" data-sort="status">Shortlink</th>
                <th scope="col" class="sort" data-sort="name">Tanggal Dibuat</th>
                <th scope="col" class="sort" data-sort="completion">Tanggal Diubah</th>
                <th scope="col" class="sort" data-sort="completion">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
            @foreach($shortlink as $key=> $row)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <span class="status">{!!str_limit($row->original_link,'30')!!}
                    </span>
                  </span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <span class="status">{{ route('admin.shorten.link', $row->short_link) }}</span>
                  </span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <span class="status">{{ date("d M Y", strtotime($row->created_at)) }}</span>
                  </span>
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <span class="status">{{ date("d M Y", strtotime($row->updated_at)) }}</span>
                  </span>
                </td>
                <td>
                <button type="submit" class="btn btn-sm btn-danger icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" type="button" onclick="hapus({{ $row->id }})"><i class="fas fa-trash"></i></button>
                <form id="hps-{{ $row->id }}" action="{{ route('admin.short_link_all.destroy', ['short_link_all' => $row]) }}" method="POST" style="display: none;" >
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
              {{ $shortlink->links() }}
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