@extends('app')
@section('content')

<div class="text-end mb-2">
    <a class="btn btn-success" href="{{ route('positions.create') }}"> Add Position</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Singkatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($positions as $position)
        <tr>
            <td>{{ $position->id }}</td>
            <td>{{ $position->name }}</td>
            <td>{{ $position->keterangan }}</td>
            <td>{{ $position->alias }}</td>
            <td>
                <form action="{{ route('positions.destroy',$position->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('positions.edit',$position->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection