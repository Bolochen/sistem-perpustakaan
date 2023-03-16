@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Book</h1>
    </div>

    <div class="col-lg-8"> 
        <form method="post" action="/dashboard/buku" class="mb-5">
            @csrf   
            <div class="mb-3">
              <label for="title" class="form-label">Book's Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
              @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>  
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected >{{ $category->nama }}</option>    
                        @else
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                            <option value="Tersedia" selected >Tersedia</option>    
                            <option value="Dipinjam">Dipinjam</option>  
                </select>
            </div>           
            <button type="submit" class="btn btn-primary">Create Category</button>
          </form>
    </div>    
@endsection