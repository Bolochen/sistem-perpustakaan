@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">List category</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-secondary col-lg-6" role="alert">
    {{ session('success') }}
  </div>
@endif

    <div class="table-responsive col-lg-9">
        <a href="/dashboard/category/create" class="btn btn-primary mb-3">Create new category</a>
        <table class="table table-bordered">
        <thead>
        <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Opsi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->nama }}</td>
            <td>
                <a href="/dashboard/category/{{ $category->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')">
                  <span data-feather="minus-circle"></span>
                </button>
                </form>
              </td>
        </tr> 
        @endforeach
    </div>
@endsection
