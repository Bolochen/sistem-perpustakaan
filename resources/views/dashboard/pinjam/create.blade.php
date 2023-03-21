@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add new pinjaman</h1>
    </div>

    <div class="col-lg-8"> 
        <form method="post" action="/dashboard/pinjamkembali" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="mahasiswa" class="form-label">Mahasiswa</label>
                <select class="form-select" name="mahasiswa_id">
                    @foreach ($mahasiswas as $mahasiswa)
                        @if (old('mahasiswa_id') == $mahasiswa->id)
                            <option value="{{ $mahasiswa->id }}" selected >{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>    
                        @else
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="buku" class="form-label">Buku</label>
                <select class="form-select" name="buku_id">
                    @foreach ($bukus as $buku)
                        @if (old('buku_id') == $buku->id)
                            <option value="{{ $buku->id }}" selected >{{ $buku->title }}</option>    
                        @else
                            <option value="{{ $buku->id }}">{{ $buku->title }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>    
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" name="tgl_pinjam" required autofocus value="{{ old('tgl_pinjam') }}">
                @error('tgl_pinjam')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_tempo" class="form-label">Tanggal tempo</label>
                <input type="date" class="form-control @error('tgl_tempo') is-invalid @enderror" id="tgl_tempo" name="tgl_tempo" required autofocus value="{{ old('tgl_tempo') }}">
                @error('tgl_tempo')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>     
            <button type="submit" class="btn btn-primary">Create Pinjaman</button>
          </form>
    </div>
@endsection