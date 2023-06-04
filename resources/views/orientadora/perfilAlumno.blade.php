@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid img-circle w-25 mb-2"
                       src="{{asset('images/userojoPerfil.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$alumno->nombre}} {{$alumno->paterno}}</h3>

                <p class="text-muted text-center">Estudiante</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Grado y grupo</b> <a class="a float-right">{{$alumno->grupo}}</a>
                    </li>
                  <li class="list-group-item">
                    <b>Edad</b> <a class="a float-right">{{$alumno->edad}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tramites totales</b> <a class="a float-right">{{$tramitetotal}}</a>
                  </li>
                </ul>
                <div class="dropdown show">
                <a class="btn-github a text-center dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-file"></i> Tramitar
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('constancia/pdf', $alumno->nombre_completo)}}">Descargar constancia</a>
                    <a class="dropdown-item" href="{{url('tramites/pase_salida', $alumno->nombre_completo)}}">Tramitar pase de salida</a>
                    <a class="dropdown-item" href="{{url('tramites/justificanteOrientadora', $alumno->nombre_completo)}}">Tramitar justificante</a>
                </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
            <div class="col">
                <!-- About Me Box -->
                <div class="card card-light" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                    <div class="card-header" style="border-radius: 10px 10px 0px 0px !important;">
                        Acerca de
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i>Nombre completo</strong>
                        
                        <p class="text-muted">
                            {{$alumno->nombre_completo}}
                        </p>
                        
                        <hr>
                        <strong><i class="fas fa-phone mr-1"></i>Teléfono</strong>
                        
                        <p class="text-muted">
                            {{$alumno->telefono}}
                        </p>
                        
                        <hr>
                        
                        <strong><i class="fas fa-venus-mars"></i>Sexo</strong>
                        
                        <p class="text-muted">
                            @if($alumno->sexo == 'H') Hombre @else Mujer @endif
                        </p>
                        
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i>Especialidad</strong>
                
                <p class="text-muted">
                    <span class="tag tag-danger">{{$alumno->carrera}}</span>
                </p>
                        
                
                <hr>
                
                <strong><i class="fas fa-map-marker-alt mr-1"></i>Ubicación</strong>
                
                <p class="text-muted">{{$alumno->domicilio}}</p>
                
                <hr>
                
                <strong><i class="fas fa-clock mr-1"></i>Turno</strong>
                
                <p class="text-muted mb-0">
                    <span class="tag tag-danger">@if($alumno->turno == 'matutino') Matutino @else Vespertino @endif</span>
                </p>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@stop
