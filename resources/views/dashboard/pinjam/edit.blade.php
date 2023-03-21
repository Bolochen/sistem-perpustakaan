@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengembalian pinjaman buku</h1>
    </div>

    <div class="col-lg-8"> 
        <p>Tanggal pinjam : {{ $pinjamkembali->tgl_pinjam }}</p>
        <p>Tanggal Tempo : {{ $pinjamkembali->tgl_tempo }}</p>
        @if (strtotime(today()) > strtotime($pinjamkembali->tgl_tempo))
            <h3>Telat, berikan denda</h3>
        @endif
        <form method="post" action="/dashboard/pinjamkembali/{{ $pinjamkembali->id }}" class="mb-5">
            @method('put')
            @csrf                 
            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal kembali</label>
                <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" name="tgl_kembali" required autofocus value="{{ old('tgl_kembali') }}">
                @error('tgl_kembali')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>     
            <button type="submit" class="btn btn-primary">Create Pinjaman</button>
          </form>
    </div>
@endsection