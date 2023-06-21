@extends('sidebar')
@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hai {{ Auth()->user()->name }} </strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="text-end mb-2">
    <!-- <a class="btn btn border border" href="department/exportPdf" target="_blank">
        <i class="nav-icon fas fa-print"></i>
    </a> -->
    <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fa fa-plus"></i> Add User</a>
</div>

<table id="example" class="table table-hover" style="width:100%">
    <thead class="thead-dark">
        <tr class="table-active">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Posisi</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($users as $user)
        <tr class="table-hover-color">
            <td>{{ $i++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ (isset($user->positions->name)) ? $user->positions->name : 'Not Found' }}</td>
            <td>{{ (isset($user->departments->nama) ? $user->departments->nama  : 'Not Found') }}</td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    <a href="{{ route('users.edit', $user->id) }}"><i class="nav-icon fas fa-edit"></i></a>
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
@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection