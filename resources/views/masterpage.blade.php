<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$title}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
        <!-- Font Awesome -->
      <!--   <link rel="stylesheet" href="{{asset('/adminLTE/css/font-awesome.min.css')}}">
       -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.1/collection/icon/icon.css">
        <!-- jvectormap -->

        {{-- dropzone --}}
        <link rel="stylesheet" type="text/css" href="{{asset('adminlte/dropzone/assets/css/dropzone.css')}}">

        {{-- select2 --}}
        <link rel="stylesheet" type="text/css" href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
        
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css">
        <!-- Theme style -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.css">
      
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/skins/_all-skins.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

      
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/img/avatar5.png" class="user-image" alt="User Image">
            {{-- <span class="hidden-xs">{{Auth::user()->name}}</span> --}}
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Sign out
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <section class="sidebar">

      {{-- sidebar menu --}}
        <div class="user-panel">
            <div class="pull-left image">
              <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              {{-- <p>{{Auth::user()->name}}</p> <!-- ini untuk sidebar admin --> --}}
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          {{-- untuk sidebar --}}
          <ul class="sidebar-menu" data-widget="tree">

              <li id="menu_home"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>

              {{-- untuk master --}}
              {{-- @if (Auth::user()->role_type == "GA") --}}
                  <li class="treeview" id="menu_master">
                    <a href="#">
                      <i class="fas fa-blog"></i> <span>Blog</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span> 
                    </a>
                    <ul class="treeview-menu">
                      <li id="submenu_users"><a href="{{url('users')}}"><i class="fa fa-users"></i> Users</a></li>
                      <li id="submenu_tags"><a href="{{url('tags')}}"><i class="fa fa-tag"></i> Tags</a></li>
                      <li id="submenu_quotes"><a href="{{url('quotes')}}"><i class="fa fa-quote-left"></i> Quotes</a></li>
                    </ul>
                  </li>
                {{-- @endif --}}
                </ul>
    </section>
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if(session('status_error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Error!</h4>
      {{session('status_error')}}
    </div>
    @elseif(session('status_info'))
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-info"></i> Info!</h4>
      {{session('status_info')}}
    </div>
    @elseif(session('status_warning'))
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Warning!</h4>
      {{session('status_warning')}}
    </div>
    @elseif(session('status_success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      {{session('status_success')}}
    </div>
    @elseif($errors->any())
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Error!</h4>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {!!$pagecontent!!}
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong> ari for study laravel Copyright © 2019 - @php
        echo date('Y')
    @endphp.</strong>
  </footer> --}}

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }} "></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
{{-- select2 --}}
<script  src="{{asset('adminlte/bower_components/select2/dist/js/select2.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>

{{-- <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/datatables.bootstrap.js')}}"></script> --}}
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

{{-- dropzone --}}
<script src="{{ asset('adminlte/dropzone/assets/js/dropzone.min.js') }}"></script>
<script src="{{ asset('adminlte/dropzone/assets/js/scripts.js') }}"></script>

<script>
  $('#menu_{{$menu}}').addClass('active');
  $('#submenu_{{$submenu}}').addClass('active');
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

  $('.datepicker').datepicker({
   autoclose: true,
   dateFormat: 'yyyy-mm-dd'
 });
  
 $('.select2').select2();
 $('.dropzone').dropzone();


</script>
</body>
</html>
