@extends('layout/app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username :</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="mb-3">
                <label>Password :</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            </br>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Masuk">
                <a class="btn btn-info" href="#">Register</a>
            </div>
        </form>
    </div>
</div>
@endsection