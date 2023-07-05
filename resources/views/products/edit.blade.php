@extends('sidebar')
@section('content')

<form action="{{ route('products.update', $product->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukan name"
                    value="{{ $product->name }}">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>price :</strong>
                <input type="text" name="price" class="form-control" placeholder="Masukan price"
                    value="{{ $product->price }}">
                @error('price')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('products.index') }}">Back</a>
        </div>
    </div>
</form>

@endsection