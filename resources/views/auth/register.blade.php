<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Masyarakat</title>

  <link rel="stylesheet" href="{{ asset('js/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Complaints Reports | Register</p>
      @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif

        <form action="{{ route('register.action')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
          <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan Nik">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div> 
        <div class="input-group mb-3">
          <input type="text" name="name" id="name" class="form-control" placeholder="Masukan name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukan Telephone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="id" class="form-control" placeholder="Masukan Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Konfirmasi Password" value="{{ old('password')}}" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Daftar">
        </div>
      </form>
      <p class="mb-0">
      <a class="btn btn-danger" href="{{ route('login') }}">Back</a>
      </p>
    </div>
  </div>
</div>
<!-- /.login-box -->
</body>
</html>




<!-- <div class="row">
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
                <label>Telephone :</label>
                <input class="form-control" type="text" name="telp" id="telp">
            </div>
            <div class="mb-3">
                <label>Password :</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <label>Password Confirmed:</label>
                <input class="form-control" type="password" name="password_confirmed" value="{{ old('password_confirmed')}}" />
            </div>
            <br>
            <div class="mb-3">
                <button class="btn btn-info">Register</button>
                 <a href="{{ route('login')}}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div> -->

    
