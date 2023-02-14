@extends('layout/app')
@section('content')

<div class="row">
    <div class="col-md-6">
        @if ($errors->any())
        @foreach ($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action')}}" method="POST">
            @csrf 
            <div class="mb-3">
                <label>Nama :</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label>Username :</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label>Password :</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <label>Password Confirmed:</label>
                <input class="form-control" type="password" name="password_confirmed" value="{{ old('password_confirmed')}}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
                 <a href="{{ route('home')}}" class="btn btn-info">Kembali</a>
            </div>
        </form>
    </div>
</div>
    
@endsection