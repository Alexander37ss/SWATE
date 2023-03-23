@extends('appOrientadora')

@section('titulo')
@stop

@section('home')

<?php 
    $meses = [
        "01" => 'Enero',
        "02" => 'Febrero',
        "03" => 'Marzo',
        "04" => 'Abril',
        "05" => 'Mayo',
        "06" => 'Junio',
        "07" => 'Julio',
        "08" => 'Agosto',
        "09" => 'Septiembre',
        "10" => 'Octubre',
        "11" => 'Noviembre',
        "12" => 'Diciembre'
    ];
?>
<!-- <h3 class="mb-2">Información</h3> -->
<div class="row">
  <div class="col-md-6 col-sm-6 col-12">
  <div class="info-box bg-success">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
      <span class="info-box-text">Justificantes de <?php echo($meses[ $mes ]);?> del {{$ano}}</span>
      <span class="info-box-number">{{ $justificantes->count() }}</span>
      </div>
      <!-- /.info-box-content -->
      </div>
    <!-- /.info-box -->
    </div>
  <!-- /.col -->
  <div class="col-md-6 col-sm-6 col-12">
    <div class="info-box bg-success">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pases de salida de <?php echo($meses[ $mes ]);?> del {{$ano}}</span>
        <span class="info-box-number">{{ $paseSalida->count() }}</span>
      </div>
    </div>
  </div>
    <!-- otro -->
    <div class="col-md-6 col-sm-6 col-12">
    <div class="small-box bg-gradient-warning">
  <div class="inner">
    <h3>{{ $preJustificantes }}</h3>
    <p>Solicitudes pendientes</p>
  </div>
  <div class="icon">
    <i class="fas fa-bell"></i>
  </div>
  <a href="{{asset('tramites/solicitudJustificante')}}" class="small-box-footer">
    Ver más <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
</div>

</div>
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="mb-2 card-title"><i class="far fa-clock"></i> Historial De Tramites</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <!-- barra de busqueda -->
          <div class="shadow-sm">
            <div class="input-group input-group-sm">
              <input class="form-control mr-sm-2" id="busquedaHistorial" type="search" placeholder="Escribe el nombre del alumno..." aria-label="Search" onchange="BuscarAlumnosHistorial();">
              <div class="input-group-append">
                <button class="btn btn-navbar shadow-sm" id="busquedaBotonHistorial" style="background-color: #a7201f;">
                  <i class="fas fa-search link-activo"></i>
                </button>
              </div>
              <div class="input-group-append">
                <a id="BotonFiltroHistorial" class="btn btn-secondary btn-sm" href="{{asset('home')}}">Borrar filtros</a>
              </div>
            </div>
          </div>
          <!-- fin barra de busqueda -->
          <br>
          <!-- TABLA -->
          <div class="responsive-table">
            <table class="table table-sm table-hover table-striped" id="TablaHistorial">
                <thead>
                    <tr>
                        <th>
                            <div class="dropdown">
                                <button class="btn bg-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>Tipo de tramite</b>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('tramites/historialJustificante', ['tipo' => 2])}}">Pase De Salida</a>
                                    <a class="dropdown-item" href="{{url('tramites/historialJustificante', ['tipo' => 3])}}">Justificante</a>
                                </div>
                            </div>
                        </th>
                        <th>Alumno</th>
                        <th>Motivo</th>
                        <th>
                            <div class="dropdown">
                                <button class="btn bg-white dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>Fecha creada</b>
                                </button>
                                <div class="dropdown-menu pt-0 pb-0" aria-labelledby="dropdownMenuButton">
                                  <input class="form-control" id="busquedaFecha" type="date" placeholder="YYYY-MM" aria-label="Search" onchange="BuscarFecha();">
                                </div>
                            </div>
                        </th>
                        <th>Dia(s) solicitados</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tramites as $tra)
                        <tr>
                            <td>{{$tra->tipo->nombre}}</td>
                            <td>{{$tra->alumno->nombre_completo}}</td>
                            <td>
                              @if ($tra->tramite_detalle->motivo != 'Otro...')
                                {{$tra->tramite_detalle->motivo}}
                              @else
                                {{$tra->tramite_detalle->motivo_otro}}
                              @endif
                            </td>
                            <td>{{$tra->tramite_detalle->fecha_solicitada}}</td>
                            <td>                              
                              @if ($tra->tramite_detalle->del == $tra->tramite_detalle->al)
                                {{$tra->tramite_detalle->del}}
                              @else
                                {{$tra->tramite_detalle->del}} - {{$tra->tramite_detalle->al}}
                              @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
