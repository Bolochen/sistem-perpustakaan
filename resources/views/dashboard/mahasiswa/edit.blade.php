@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit student</h1>
    </div>

    <div class="col-lg-8"> 
        <form method="post" action="/dashboard/mahasiswa/{{ $mahasiswa->nim }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf   
            <div class="mb-3">
              <label for="nim" class="form-label">Nim</label>
              <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required autofocus value="{{ old('nim', $mahasiswa->nim ) }}">
              @error('nim')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $mahasiswa->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $mahasiswa->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat', $mahasiswa->alamat ) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto mahasiswa</label>
                <input type="hidden" name="oldImage" value="{{ $mahasiswa->image }}">
                @if ($mahasiswa->image)
                <img src="{{ asset('storage/' . $mahasiswa->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> 
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">  
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>            
            <button type="submit" class="btn btn-primary">Edit Student</button>
          </form>
    </div>
    <script>

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>    
@endsection