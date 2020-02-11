<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ Session::get('nombre') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
<!--   <meta content="width=device-width, in itial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->

  <meta name="token" id="token" value="{{ csrf_token() }}">
  <script src="{{asset('js/vue.min.js')}}"></script>

  <script src="{{asset('js/vue-resource.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/AdminLTE.css') }}">

  <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">

  <link rel="stylesheet" href="{{ asset('adminlte/css/skins/skin-blue.min.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIL</b>MAR</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('imagenes/usuarios/'.Session::get('foto')) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Session::get('nombre') }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('imagenes/usuarios/'.Session::get('foto')) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Session::get('nombre') }} - {{ Session::get('nivel') }}
                  <small>Miembro desde 2020</small>
                </p>
              </li>
          
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('imagenes/usuarios/'.Session::get('foto')) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Session::get('nombre') }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">SILMAR</li>
        <!-- Optionally, you can add icons to the links -->
        
        <!-- Si es cajero-->
       <!--  @if(Session::get('nivel') == "Feligres")

        <li class="active"><a href="capilla"><i class="fa fa-map-marker"></i> <span>Capillas</span></a></li>
      
        @endif -->
        @if(Session::get('nivel') == "Parroco" )
        
        <li class="active"><a href="capilla"><i class="fa fa-map-marker"></i> <span>Capillas</span></a></li>
        @endif
        
        @if(Session::get('nivel') == "Secretaria")
        <li class="active"><a href="personal"><i class="fa fa-users"></i> <span>Personal</span></a></li>
        <li class="active"><a href="capilla"><i class="fa fa-map-marker"></i> <span>Capillas</span></a></li>
        <li class="active"><a href="servicio"><i class="fa fa-map-marker"></i> <span>Cat. Servicios</span></a></li>

        @endif

        @if(Session::get('nivel') == "Feligres")
        <li class="active"><a href="personal"><i class="fa fa-users"></i> <span>Personal</span></a></li>
        @endif

        <!-- Si es Administrador, Gerente o Supervisor-->
        

        <!-- <li class="active"><a href="clientes"><i class="fa fa-group"></i> <span>Clientes</span></a></li>

        <li><a href="productos"><i class="fa fa-barcode"></i> <span>Productos</span></a></li> -->

        
        
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       @yield('titulo')
        <small>Sistema de administración Parroquial</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Nivel</a></li>
        <li class="active">{{ Session::get('nivel')}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('contenido')
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@stack('scripts')

<script src="{{ asset('js/jquery.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="{{asset('js/Chart.js')}}"></script>

</body>
</html>
