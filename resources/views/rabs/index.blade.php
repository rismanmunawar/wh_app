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
            <li><a class="dropdown-item" href="department/exportPdf" target="_blank"><i class="fas fa-file-word"></i>
                    Word</a></li>
            <li><a class="dropdown-item" href="position/export-excel" target="_blank"><i class="fas fa-file-excel"></i>
                    Excel</a></li>
        </ul>

        <a class="btn btn-success" href="{{ route('rabs.create') }}"> <i class="fa fa-plus"></i> Add Rabs</a>

    </div>
</div>

<table id="example" class="table table-hover" style="width:100%">
    <thead class="thead-dark">
        <tr class="table-active">
            <th scope="col">No</th>
            <th scope="col">Nama Product</th>
            <th scope="col">Price</th>
            <th scope="col">QTY</th>
            <th scope="col">Sub Total</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
       
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