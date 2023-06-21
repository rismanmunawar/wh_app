@extends('sidebar')
@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hai {{ Auth()->user()->name }} </strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="text-end mb-2">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="printDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-print"></i> Cetak
        </button>
        <ul class="dropdown-menu" aria-labelledby="printDropdown">
            <li><a class="dropdown-item" href="good/exportPdf" target="_blank"><i class="fas fa-file-word"></i> Word</a>
            </li>
            <li><a class="dropdown-item" href="position/export-excel" target="_blank"><i class="fas fa-file-excel"></i>
                    Excel</a></li>
        </ul>

        <a class="btn btn-success" href="{{ route('goods.create') }}"> <i class="fa fa-plus"></i> Add good</a>
    </div>
</div>

<table id="example" class="table table-hover" style="width:100%">
    <thead class="thead-dark">
        <tr class=" table-active">
            <th scope="col">No</th>
            <th scope="col">WareHouse ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($goods as $good)
        <tr class="table-hover-color">
            <td>{{ $i++ }}</td>
            <td>{{ ($good->warehouse ? $good->warehouse->name : 'Not Found') }}</td>
            <td>{{ $good->nama }}</td>
            <td>{{ $good->harga }}</td>
            <td>
                <form action="{{ route('goods.destroy',$good->id) }}" method="Post">
                    <a href="{{ route('goods.edit',$good->id) }}"><i class="nav-icon fas fa-edit"></i></a>
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