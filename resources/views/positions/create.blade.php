@extends('sidebar')
@section('content')

<form action="{{ route('positions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nama">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                @error('keterangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alias :</strong>
                <input type="text" name="alias" class="form-control" placeholder=" alias">
                @error('alias')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('positions.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection