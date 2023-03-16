@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Book</h1>
    </div>

    <div class="col-lg-8"> 
        <form method="post" action="/dashboard/buku" class="mb-5">
            @csrf   
            <div class="mb-3">
              <label for="name" class="form-label">Book's Title</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              <label for="name" class="form-label">Kategori</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
              <label for="name" class="form-label">Status</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
              @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>             
            <button type="submit" class="btn btn-primary">Create Category</button>
          </form>
    </div>    
@endsection