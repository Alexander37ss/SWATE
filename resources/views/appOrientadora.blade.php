<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SWATE</title>
  <link rel="icon" type="image/x-icon" href="{{ url('images/logohb.ico') }}">
  <link rel="icon" href="{{asset('img/cetis.png')}}">
  <!-- prueba -->
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('cssswate/main.css')}}">

  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- rubik font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,200&family=Rubik:wght@500&display=swap" rel="stylesheet">
  <style>
    div nav ul {
        justify-content: center;
    }
  </style>
<?php 
  $i = 0;
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini sidebar-collapse">

<div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark border-bottom-0 shadow-md" style="background-color: #A7201F;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
<!--               <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('swate/home')}}" class="nav-link">Principal</a>
              </li> -->
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <!-- search -->
              
              <!-- Messages Dropdown Menu -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item"> -->
                    <!-- Message Start -->
                    <!-- <div class="media">
                      <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Brad Diesel
                          <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div> -->
                    <!-- Message End -->
                  <!-- </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item"> -->
                    <!-- Message Start -->
                    <!-- <div class="media">
                      <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          John Pierce
                          <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div> -->
                    <!-- Message End -->
                  <!-- </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item"> -->
                    <!-- Message Start -->
                    <!-- <div class="media">
                      <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Nora Silvester
                          <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div> -->
                    <!-- Message End -->
                  <!-- </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
              </li> -->
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" >
                  <i class="fas fa-inbox cursor-pointer"></i>
                  <span class="badge badge-light navbar-badge cursor-pointer">{{$preJustificantes}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-header">Bandeja de entrada</span>
                  <div class="dropdown-divider"></div>
                  @foreach ($pre_justificantes as $pre)
                  <a href="{{ url('tramites/solicitudJustificante', $pre->id)}}" class="dropdown-item btn">
                    <i class="fas fa-envelope mr-2"></i>@if($pre->motivo == 'Otro'){{$pre->motivo_otro}} @else {{$pre->motivo}} @endif 
                    <span class="float-left text-muted text-sm">{{$pre->alumno->nombre_completo}}</span>
                  </a>
                  @if(++$i == 3) 
                  <?php 
                  break;
                  ?>
                  @endif
                  @endforeach
                  <div class="dropdown-divider"></div>
                  <a href="{{asset('/tramites/solicitudJustificante')}}" class="dropdown-item dropdown-footer rojo-cetis">Ver todas las notificaciones</a>
                </div>
              </li> 
              <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-warning" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;">
          <!-- Brand Logo -->
          <a href="{{asset('/home')}}" class="brand-link logo-switch">
          <img src="{{asset('img/cetis.png')}}" class="brand-image-xl logo-xs ml-1">
          <img src="{{asset('img/dgetilogo2.png')}}" class="brand-image-xs logo-xl ml-5" style="">
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{{asset('images/userojo.png')}}"class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                    <a class="d-block">{{ Auth::user()->name; }}</a>
                {{-- <span>{{(Auth::user()->roles[0]->name)}}</span> --}}
                <a class="d-block text-dgeti">Orientadora</a>
<!--                 <a class="d-block" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Cerrar sesión') }}
                </a> -->
                
              </div>
            </div>

            {{-- <!-- SidebarSearch Form -->
            <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
            </div> --}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                  <a href="{{asset('/home')}}" class="nav-link" id="home">
                  <svg class="nav-icon mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>
                    <p id = "parrafohome">
                      Inicio
                    </p>
                  </a>
                </li>
                
                {{-- material de la orientadora --}}

                <li class="nav-item">
                  <a href="{{asset('/tramites/consultar')}}" class="nav-link" id="consultar">
                  <svg class="nav-icon mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72L5.18 9L12 5.28L18.82 9zM17 15.99l-5 2.73l-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                    <p>Consultar alumnos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{asset('/historial')}}" class="nav-link" id="consultar">
                  <svg class="nav-icon mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54l.72-1.21l-3.5-2.08V8H12z"/></svg>
                    <p>Historial de trámites</p>
                  </a>
                </li>
                <!-- treeview -->
                <li class="nav-item">
            <a href="#" class="nav-link">
            <svg class="mb-1 nav-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2z"/></svg>
              <p>
                Otras opciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/graficas')}}" class="nav-link">
                <svg class="nav-icon mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8z"/></svg>
                  <p>Información</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
<!-- 
                <li class="nav-item">
                  <a href="{{asset('/tramites/solicitudJustificante')}}" class="nav-link" id="solicitudes_justificate">
                    <i class="fas fa-tags nav-icon"></i>
                    <p>Solicitudes pendientes
                    </p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="{{ route('logout') }}" class="fixed-bottom ml-4 mb-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg class="nav-icon logo-logout" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
              </svg>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form> 
          </li>
          </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @yield('titulo')
                        </div>
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrum')
                        </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content" style="padding:0 .99rem !important;">
                @yield('home')
                <div class="">
                    <div class="">
                        @yield('contenido')
                    </div>
                </div>
            </section>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark"> --}}
          <!-- Control sidebar content goes here -->
        {{-- </aside> --}}
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer">
          <strong>SWATE &copy; 2023.</strong>
          derechos reservados.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
          </div>
          <a class="lopez">Página web</a>
        </footer>
      </div>
      <!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
{{-- <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script> --}}
<!-- ChartJS -->
<script src="{{asset('js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('jsswate/breadcrum.js')}}"></script>
<script src="{{asset('jsswate/main.js')}}"></script>
<script src="{{asset('jsswate/consultar.js')}}"></script>
<script src="{{asset('jsswate/historial.js')}}"></script>
<script src="{{asset('jsswate/recargarPagina.js')}}"></script>
<script src="{{asset('jsswate/graficas.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{asset('js/dashboard2.js')}}"></script>-->
@yield('scripts')
</body>
</html>
