@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hai {{ Auth()->user()->name }} </strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="text-end mb-2">
    <!-- <a class="btn btn-success" href="{{ route('positions.create') }}"> Add Position</a> -->
    <a class="btn btn-success" href="{{ route('positions.create') }}"> <i class="fa fa-plus"></i> Add Position</a>
</div>

<table class="table table-striped">
    <thead>
        <tr class="table-active">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Singkatan</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($positions as $position)
        <tr class="table-hover-color">
            <td>{{ $i++ }}</td>
            <td>{{ $position->name }}</td>
            <td>{{ $position->keterangan }}</td>
            <td>{{ $position->alias }}</td>
            <td>
            <form action="{{ route('positions.destroy',$position->id) }}" method="Post">
                    <a href="{{ route('positions.edit',$position->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn" onclick="confirmDelete()"><i class="fa fa-trash text-danger"></i></button>

                    <script>
                      function confirmDelete() {
                         if (confirm("Apakah Anda yakin akan menghapus data ini?")) {
                             document.getElementById("delete-form").submit();
                         }
                             }
                    </script>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection