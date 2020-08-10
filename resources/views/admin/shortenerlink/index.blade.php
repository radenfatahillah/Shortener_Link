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
            <h3 class="mb-0">List URL Shortener</h3>
          </div>
          <!-- List URL Shortener -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light text-center">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Tanggal Dibuat</th>
                  <th scope="col" class="sort" data-sort="budget">Original Link</th>
                  <th scope="col" class="sort" data-sort="status">Shortlink</th>
                  <th scope="col" class="sort" data-sort="completion">Tanggal Diubah</th>
                  <th scope="col" class="sort" data-sort="completion">Aksi</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list text-center">
              @foreach($shortlink as $sl)
                <tr>
                <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?= date("d M Y", strtotime($sl->created_at)) ?></span>
                    </span>
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?= substr($sl->original_link, 0, 70)?></span>
                    </span>
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?= url('/dk/'. $sl->short_link) ?></span>
                    </span>
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?= date("d M Y", strtotime($sl->updated_at)) ?></span>
                    </span>
                  </td>
                  <td>
                  <a href="#" class="btn btn-sm btn-success icon icon-shape icon-sm bg-gradient-green text-white rounded-circle shadow">
                  <i class="fas fa-edit"></i>
                  </a>
                  <form action="<?= route('admin.shortenerlinkdelete',['id'=>$sl->id]) ?>" method="POST" onclick="return confirm('Confirm delete?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger icon icon-shape icon-sm bg-gradient-red text-white rounded-circle shadow"><i class="fas fa-trash"></i></button>
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
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>
  
@endsection

@push('js')

@endpush