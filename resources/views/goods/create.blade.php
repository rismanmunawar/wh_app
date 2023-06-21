@extends('sidebar')
@section('content')

<form action="{{ route('goods.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="warehouse_id"><strong>Warehouse_id :</strong></label>
                <select name="warehouse_id" class="form-select">
                    @foreach ($warehouses as $warehouse_id)
                    <option value="{{ $warehouse_id->id}}">{{$warehouse_id->name}}</option>
                    @endforeach
                </select>
                <strong>Nama:</strong>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama">
                @error('nama')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga :</strong>
                <input type="text" name="harga" class="form-control" placeholder="Masukan Harga">
                @error('harga')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('goods.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection