@extends('layout')
@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hai {{ Auth()->user()->name }} </strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table table-striped">
    <thead class="thead-dark">
        <tr class="table-active">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Manager ID</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($departments as $department)
        <tr class="table-hover-color">
            <td>{{ $i++ }}</td>
            <td>{{ $department->nama }}</td>
            <td>{{ $department->location }}</td>
            <td>{{ $department->getManager->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection