@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">Profil : {{ $mahasiswa->nama }}</h2>

                <a href="/dashboard/mahasiswa" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all mahasiswa</a>
                <a href="/dashboard/mahasiswa/{{ $mahasiswa->nim }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/mahasiswa/{{ $mahasiswa->nim }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                    <span data-feather="minus-circle"></span> Delete
                  </button>
                </form>
               
                @if ($mahasiswa->image)
                    <div style="width:200px;height:250px; overflow:hidden;">
                        <img src="{{ asset('storage/' .$mahasiswa->image) }}" class="card-img-top mt-3" alt="{{ $mahasiswa->nama }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/200x250?student" class="card-img-top mt-3" alt="{{ $mahasiswa->nama }}" class="width:200px;height:250px; overflow:hidden">
                @endif

                <h2 class="mt-3 fs-5">Nim : {{ $mahasiswa->nim }}</h2>
                <h2 class="fs-5">Nama : {{ $mahasiswa->nama }}</h2>
                <h2 class="fs-5">Email : {{ $mahasiswa->email }}</h2>
                <h2 class="fs-5">Alamat : {{ $mahasiswa->alamat }}</h2>
        </div>
    </div>
</div>
@endsection