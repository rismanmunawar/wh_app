@extends('sidebar')
@section('content')

<form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lokasi :</strong>
                <input type="text" name="location" class="form-control" placeholder="Masukan Lokasi">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        
        <label for="manager_id"><strong>Manager :</strong></label>
        <select name="manager_id" class="form-control">
            @foreach ($managers as $manager)
            <option value="{{ $manager->id}}">{{$manager->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
        <a button type="submit" class="btn btn-danger mt-4" href="{{ route('departments.index') }}">Back</a>
    </div>
    </div>
</form>
@endsection