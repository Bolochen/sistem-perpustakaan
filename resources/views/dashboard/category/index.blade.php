@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">List category</h1>
</div>

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
            <td>Otto</td>
        </tr> 
        @endforeach
    </div>
@endsection
