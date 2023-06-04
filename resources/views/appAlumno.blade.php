<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SWATE</title>
  <!-- icon page -->
  <link rel="icon" href="{{asset('img/cetis.png')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
  <link rel="stylesheet" href="{{asset('cssswate/code.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- fonts -->
  <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- personal fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,900;1,200&family=Rubik:wght@500&display=swap" rel="stylesheet">
<!-- fin head -->
  <style>
    div nav ul {
        justify-content: center;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed  sidebar-mini sidebar-collapse">
<div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light border-bottom-null">
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
              {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">00</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">0 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> No existen notificaciones98908
                    <span class="float-right text-muted text-sm">0</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
                </div>
              </li> --}}
            </ul>
          </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom elevation-4 sidebar-light-warning">
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
                <a class="d-block text-dgeti">Estudiante</a>
<!--               <a class="d-block" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Cerrar sesión') }}
                </a> -->

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form> 
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
                {{-- material del alumno --}}

                <li class="nav-item">
                      <a href="{{url('alumno/misSolicitudes')}}" class="nav-link">
                      <i class="far fa-paper-plane nav-icon"></i>
                        <p>Mis solicitudes</p>
                      </a>
                    </li>
                    <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-file"></i>
                    <p>
                      Trámites
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('alumno/justificante')}}" class="nav-link"> 
                      <svg class="nav-icon mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"/><path fill="currentColor" d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"/></svg>
                        <p>Solicitar justificante</p>
                      </a>
                    </li>
                <li class="nav-item">
                      <a href="{{url('alumno/constancia/pdf', auth()->user()->name)}}" class="nav-link" onclick="constanciaDescargar();">
                      <svg class="nav-icon mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 20q-.825 0-1.413-.588T4 18v-3h2v3h12v-3h2v3q0 .825-.588 1.413T18 20H6Zm6-4l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11l-5 5Z"/></svg>
                        <p>Constancia</p>
                      </a>
                    </li>
                  </ul>
                </li>
                    
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
          <div class="sidebar-custom">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <svg class="nav-icon logo-logout" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                    </svg>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                  </form> 
          </div>
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
                <div>
                    <div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('jsswate/breadcrum.js')}}"></script>
<script src="{{asset('jsswate/appAlumno.js')}}"></script>
<script src="{{asset('jsswate/main.js')}}"></script>
<script src="{{asset('jsswate/justificanteAlumno.js')}}"></script>
<script src="{{asset('jsswate/historial.js')}}"></script>
<script src="{{asset('jsswate/alumnoHome.js')}}"></script>
<script src="{{asset('jsswate/navbar.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{asset('js/dashboard2.js')}}"></script>-->
@yield('scripts')
</body>
</html>
