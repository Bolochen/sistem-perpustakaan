@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar buku pinjaman</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-secondary col-lg-6" role="alert">
    {{ session('success') }}
  </div>
@endif

    <div class="table-responsive col-lg-11">
        <a href="/dashboard/mahasiswa/create" class="btn btn-primary mb-3">Tambah pinjaman buku</a>
        <table class="table table-bordered">
        <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">NIM</th>
            <th scope="col">Mahasiswa</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Tanggal pinjam</th>
            <th scope="col">Tanggal tempo</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pinjamkembalis as $pinjamkembali)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th><a href="/dashboard/mahasiswa/{{ $pinjamkembali->mahasiswa->nim }}" class="text-decoration-none">{{ $pinjamkembali->mahasiswa->nim }}</a></th>
            <td>{{ $pinjamkembali->mahasiswa->nama }}</td>
            <td>{{ $pinjamkembali->buku->title}}</td>
            <td>{{ $pinjamkembali->tgl_pinjam }}</td>

            @if ($pinjamkembali->tgl_kembali !== null)
                <td class="table-success">Lunas</td>
            @else
                
                    {{-- buat liat dah lewat tempo atau belum --}}
                    @if ( strtotime("now") > strtotime( $pinjamkembali->tgl_tempo) )
                        <td class="table-danger">{{ $pinjamkembali->tgl_tempo}}</td>
                    @else
                        <td>{{ $pinjamkembali->tgl_tempo}}</td>
                    @endif

            @endif

            <td>
                <a href="/dashboard/pinjamkembali/{{ $pinjamkembali->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                @if ($pinjamkembali->tgl_kembali !== null)
                <form action="/dashboard/pinjamkembali/{{ $pinjamkembali->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')">
                    <span data-feather="minus-circle"></span>
                  </button>
                </form>
                @endif
                
              </td>
        </tr> 
        @endforeach
        <div class="d-flex justify-content-end">
            {{ $pinjamkembalis->links() }}
        </div>
    </div>
@endsection
