@extends('layouts.backend.app')

@section('title','List URL Shortener')

@push('css')

@endpush

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
          <h3 class="mb-0">List URL Shortener<span class="badge badge-pill badge-default"> {{ $shortlink->count() }}</span>
            </h3>
            
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
                      <span class="status">{{ url($row->short_link) }}</span>
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
                    <a href="{{ route('admin.kelola_link.edit', ['kelola_link' => $row]) }}" class="btn btn-sm btn-success icon icon-shape icon-sm bg-gradient-green text-white rounded-circle shadow">
                      <i class="fas fa-edit"></i>
                    </a>
                  <button type="submit" class="btn btn-sm btn-danger icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow" type="button" onclick="hapus({{ $row->id }})"><i class="fas fa-trash"></i></button>
                  <form id="hps-{{ $row->id }}" action="{{ route('admin.kelola_link.destroy', ['kelola_link' => $row]) }}" method="POST" style="display: none;" >
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