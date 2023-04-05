@extends('layout')
@section('content')

<div class="row">
    <div class="col-md-4" style="margin: 50px auto">

        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>

                <form action="{{ route('login.action') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Username / Email</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" autofocus />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Login</button>
                        <a class="btn btn-danger mx-2" href="{{ route('home') }}">Back</a>
                    </div>
                </form>
                <p class="small text-center">Don't have an account <a href="/register" class="link-underline link-underline-opacity-0">Register</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection