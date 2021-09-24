<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Hotel | Log in</title>
  <link rel="icon" href="{{sekolah()->getLogoHotel() ?? ''}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="text-center">
    <img src="{{sekolah()->getLogoHotel()}}" alt="Logo Hotel" style="height: 100px; width:auto;">
  </div>  
  <div class="login-logo">    
    <a href="/">Hotel <b>{{Str::upper(sekolah()->nama_hotel ?? "Aplikasi Hotel")}}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="nis" class="form-control" placeholder="NIS">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">         
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('template') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('template') }}/plugins/toastr/toastr.min.js"></script>
<script>
  @if(Session::has('sukses'))
    toastr.success("{{Session::get('sukses')}}", "Sukses!", {timeOut: 4000, closeButton: true})   
  @elseif(Session::has('gagal'))
    toastr.error("{{Session::get('gagal')}}", "Gagal!", {timeOut: 4000, closeButton: true})     
  @endif
</script>
</body>
</html>
