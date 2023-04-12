@extends('app')
@section('content')

<form action="{{ route('departments.update', $department->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $department->name}}" class=" form-control" placeholder="Nama">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lokasi :</strong>
                <input type="text" name="location" value="{{ $department->location}}" class="form-control" placeholder="location">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Manager ID :</strong>
                <input type="text" name="manager_id" value="{{ $department->manager_id}}" class="form-control" placeholder=" manager_id">
                @error('manager_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
        <a button type="submit" class="btn btn-danger mt-4" href="{{ route('departments.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection