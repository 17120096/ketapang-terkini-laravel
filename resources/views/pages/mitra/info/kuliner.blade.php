@extends('layouts.mitra')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Info Kuliner</h1>
    <a href="{{ route('kuliner.create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kuliner
  </a>
  </div>

  <div class="row">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Rating</th>
              <th>Jumlah Rating</th>
              <th>Keterangan</th>
              <th>Cover</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @forelse ($items as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->judul }}</td>
              <td>{{ $item->rating }}</td>
              <td>{{ $item->jml_rating }}</td>
              <td>{!! $item->keterangan !!}</td>
              <td><img class="img-thumbnail" width="200px" src="{{ Storage::url($item->cover) }}"></td>
              <td>
                <a href="{{ route('kuliner.edit', $item->id) }}" class="btn btn-info">
                <i class="fa fa-pencil-alt"></i></a>
                <form action="{{ route('kuliner.destroy', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button onclick="return confirm('Anda Yakin Hapus Data ini?')" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center">Data Kosong</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection