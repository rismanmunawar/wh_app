@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hai {{ Auth()->user()->name }} </strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="text-end mb-2">
    <a class="btn btn-success" href="{{ route('departments.create') }}"> <i class="fa fa-plus"></i> Add Department</a>
</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr class="table-active">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Manager ID</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($departments as $department)
        <tr class="table-hover-color">
            <td>{{ $i++ }}</td>
            <td>{{ $department->name }}</td>
            <td>{{ $department->location }}</td>
            <td>{{ $department->manager_id }}</td>
            <td>
                <!-- <form action="{{ route('departments.destroy',$department->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> -->
                <form action="{{ route('departments.destroy',$department->id) }}" method="Post">
                    <a href="{{ route('departments.edit',$department->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn" onclick="confirmDelete()"><i class="fa fa-trash text-danger"></i></button>

                    <script>
                      function confirmDelete() {
                         if (confirm("Apakah Anda yakin akan menghapus data ini?")) {
                             document.getElementById("delete-form").submit();
                         } else {
                            return false;
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