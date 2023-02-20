<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Complaint Reports</title>

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
      <p class="login-box-msg">Complaints Reports</p>
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
        <div class="input-group mb-3">
          <input type="text" name="username" id="nik" class="form-control" placeholder="Masukan Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
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
        <div class="row">
          <div class="col-4">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Masuk">
        </div>
      </form>
      <p class="mb-0">
      <a class="btn btn-info" href="{{ route('register') }}">Register</a>
      </p>
    </div>
  </div>
</div>
<!-- /.login-box -->
</body>
</html>

