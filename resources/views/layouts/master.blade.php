<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Hotel | @yield('title')</title>
  <link rel="icon" href="{{sekolah()->getLogoHotel() ?? ''}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.css">  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('template') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
  @yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{sekolah()->getLogoSekolah()}}" alt="Logo Sekolah" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">User Menu</span>
          <div class="dropdown-divider"></div>
          <a href="/profile" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> 
            <span class="float-right text-muted text-sm">Profile</span>
          </a>
          @if(auth()->user()->role == 'guru')
          <div class="dropdown-divider"></div>
          <a href="/setting" class="dropdown-item">
            <i class="fas fa-cogs mr-2"></i>
            <span class="float-right text-muted text-sm">Setting</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/users" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>
            <span class="float-right text-muted text-sm">Users</span>
          </a>
          @endif
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> 
            <span class="float-right text-muted text-sm">Logout</span>
          </a>          
        </div>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              @yield('page_name', Str::title(request()->path()))
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php $link = "" ?>
              @for($i = 1; $i <= count(Request::segments()); $i++)
                  @if($i < count(Request::segments()) & $i > 0)
                    <?php $link .= "/" . Request::segment($i); ?>
                    <li class="breadcrumb-item"><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a></li>
                  @else 
                    <li class="breadcrumb-item">{{ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
                  @endif
              @endfor 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> 
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('template') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('template') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('template') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('template') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('template') }}/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('template') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('template') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('template') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template') }}/dist/js/adminlte.js"></script>
<script>
  @if(Session::has('sukses'))
    toastr.success("{{Session::get('sukses')}}", "Success!", {timeOut: 4000, closeButton: true})   
  @elseif(Session::has('gagal'))
    toastr.error("{{Session::get('gagal')}}", "Failed!", {timeOut: 4000, closeButton: true})     
  @endif
  $(function(){
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
</script>
@yield('footer')
</body>
</html>
