@extends('appOrientadora')

@section('titulo')
@stop

@section('contenido')

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
<div class="text-center">
<a class="mr-4 home-header cursor-pointer home-header rojoFuego"><i class="far fa-file mr-2"></i>INFORMACIÓN</a></span>
<a class="home-header cursor-pointer"><i class="far fa-clock ml-4 mr-2"></i>HISTORIAL</a>
  <hr>
</div>
<br>
<!-- Grafica todo el tiempo -->
<div class="row">
<div class="col-md-5 ml-custom">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Tipos de tramites (todo el tiempo)</h3>
      
      
    </div>
    <div class="card-body">
      <canvas id="myChart" ></canvas>
    </div>
    <!-- /.card-body -->
  </div>
  </div>
  <!-- /.card -->
  <!-- Grafica este mes -->
  <div class=" col-md-5 mr-custom">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Tipos de tramites (este mes)</h3>
      
     
    </div>
    <div class="card-body">
      <canvas id="myChartDos" ></canvas>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.card -->
</div>
<!-- row -->
<div class="row">
  <div class="mr-1 col-md-4">
    <div class="info-box bg-success">
        <span class="info-box-icon"><i class="fa fa-file"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Justificantes de <?php echo($meses[ $mes ]);?> del {{$ano}}</span>
          <span class="info-box-number" id="numJustificanteMes">{{ $justificantesMes }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-4">
    <div class="info-box bg-success">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pases de salida de <?php echo($meses[ $mes ]);?> del {{$ano}}</span>
        <span class="info-box-number" id="numPaseSalidaMes">{{ $paseSalidaMes }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
        <!-- /.info-box -->
  </div>
</div>
        <!-- /.info-box -->
</div>
  <!-- /.col -->
  <div class="row">
    <div class="mr-1 col-md-4">
      <div class="info-box bg-success">
        <span class="info-box-icon"><i class="fa fa-file"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Justificantes del {{$ano}}</span>
          <span class="info-box-number" id="numJustificante">{{ $justificantesAno }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-4">
    <div class="info-box bg-success">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pases de salida del {{$ano}}</span>
        <span class="info-box-number" id="numPaseSalida">{{ $paseSalidaAno }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
        <!-- /.info-box -->
  </div>
</div>
        <!-- /.info-box -->
</div>
  <!-- /.col -->
<br>
        <div class="card shadow-md">
        <div class ="card-header">
          <h3 class="mb-2 card-title"><i class="far fa-clock"></i> Historial De Tramites</h3>
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
            <table class="table  table-hover " id="TablaHistorial">
                <thead>
                  <tr>
                    <th>
                      <div class="dropdown">
                        <a class="bg-white cursor-pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <b>Tipo de tramite</b><i class="fa fa-caret-down ml-2"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item btn" value="Pase de salida"  id="PaseDeSalida">Pase de salida</a>
                          <a class="dropdown-item btn" value="Justificante" id="Justificante">Justificante</a>
                        </div>
                      </div>
                    </th>
                    <th>Alumno</th>
                    <th>Motivo</th>
                    <th>
                            <div class="dropdown">
                              <a class="bg-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <b>Fecha creada</b><i class="fa fa-caret-down ml-2"></i>
                              </a>
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
                      <td>@if($tra->tipo->nombre == 'justificante')<span class="badge bg-info">Justificante</span>@else<span class="badge bg-danger">Pase de salida</span>@endif</td>
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
                    <div class="text-center">
                      {{$tramites->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop
