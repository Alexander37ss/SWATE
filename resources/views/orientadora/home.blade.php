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
<!-- typeando informacion oculta para las graficas -->
<label class="inactive" id="enero">{{$enero}}</label>
<label class="inactive" id="febrero">{{$febrero}}</label>
<label class="inactive" id="marzo">{{$marzo}}</label>
<label class="inactive" id="abril">{{$abril}}</label>
<label class="inactive" id="mayo">{{$mayo}}</label>
<label class="inactive" id="junio">{{$junio}}</label>
<label class="inactive" id="julio">{{$julio}}</label>
<label class="inactive" id="agosto">{{$agosto}}</label>
<label class="inactive" id="septiembre">{{$septiembre}}</label>
<label class="inactive" id="octubre">{{$octubre}}</label>
<label class="inactive" id="noviembre">{{$noviembre}}</label>
<label class="inactive" id="diciembre">{{$diciembre}}</label>
<label class="inactive" id="motivoVacacional">{{$motivoVacacional}}</label>
<label class="inactive" id="motivoSalud">{{$motivoSalud}}</label>
<label class="inactive" id="motivoPerdida">{{$motivoPerdida}}</label>
<label class="inactive" id="motivoOtro">{{$motivoOtro}}</label>
<label class="inactive" id="grupoDos">{{$grupoDos}}</label>
<label class="inactive" id="grupoCuatro">{{$grupoCuatro}}</label>
<label class="inactive" id="grupoSeis">{{$grupoSeis}}</label>
<!-- Saludo al usuario -->
<h4 class="saludo-home ml-3">Hola, <b>{{auth()->user()->name}}!</b></h4>
<hr>
<h4 class="saludo-home ml-3">Información</h4>
<br>
<!-- Fila 1 -->
<!-- Grafica este año -->
<div class="row">
<div class="col ml-3 mr-1" id="graficaY">
  <div class="card card-info shadow-md">
    <div class="card-header bg-cetis">
      <h3 class="card-title">Tipos de tramites (este año)</h3>
    <div class="card-tools">
   <div class="dropdown">
    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-caret-down mr-2"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item btn" style="color: black;"  id="graficaYear">Este año</a>
      <a class="dropdown-item btn" style="color: black;" id="graficaMonth">Este mes</a>
      </div>
    </div>
    <!-- fin dropdown -->
    </div>
    </div>
    <div class="card-body">
      <canvas id="myChart" ></canvas>
    </div>
    <!-- /.card-body -->
  </div>
  </div>
  <!-- /.card -->
  <!-- Grafica este mes -->
  <div class="col ml-3 mr-1 inactive" id="graficaM">
  <div class="card card-info">
    <div class="card-header bg-cetis">
      <h3 class="card-title">Tipos de tramites (este mes)</h3>
      <div class="card-tools">
   <div class="dropdown">
    <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-caret-down mr-2"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item btn" style="color: black;"  id="graficaYearDos">Este año</a>
      <a class="dropdown-item btn" style="color: black;" id="graficaMonthDos">Este mes</a>
      </div>
    </div>
    <!-- fin dropdown -->
    </div>     
    </div>
    <div class="card-body">
      <canvas id="myChartDos" ></canvas>
    </div>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.card -->
<!-- columna de informacion -->
<div class="ml-1 mr-3 col">
<!-- card info justificante -->
  <div class="info-box bg-cetis cursor-pointer">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Justificantes de <?php echo($meses[ $mes ]);?> del {{$ano}}</span>
        <span class="info-box-number" id="numJustificanteMes">{{ $justificantesMes }}</span>
    </div>
    <!-- /.info-box-content -->
</div>
<!-- fin justificante -->
<!-- card info pase salida -->
    <div class="info-box bg-cetis cursor-pointer">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pases de salida de <?php echo($meses[ $mes ]);?> del {{$ano}}</span>
        <span class="info-box-number" id="numPaseSalidaMes">{{ $paseSalidaMes }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- fin pase salida -->
  <!-- card info justificante año -->
    <div class="info-box bg-cetis cursor-pointer">
      <span class="info-box-icon"><i class="fa fa-file"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Justificantes del año {{$ano}}</span>
        <span class="info-box-number" id="numJustificante">{{ $justificantesAno }}</span>
    </div>
  </div>
  <!-- fin justificante año -->
  <!-- card info pase salida año -->
  <div class="info-box bg-cetis cursor-pointer">
    <span class="info-box-icon"><i class="fa fa-file"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Pases de salida del año {{$ano}}</span>
      <span class="info-box-number" id="numPaseSalida">{{ $paseSalidaAno }}</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- fin pase salida año -->
  </div>
  <!-- fin col -->
</div>
<!-- row -->
<br>
<!-- Fila 2 -->
<div class="row">
  <!-- Grafica de solicitudes por meses -->
<div class="col ml-3 mr-1" id="graficaY">
  <div class="card card-info shadow-md">
    <div class="card-header bg-cetis2">
      <h3 class="card-title">Solicitudes al pasar de este año</h3>
    </div>
    <div class="card-body">
      <canvas id="myChartTres"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
  </div>
  <!-- Grafica por motivos -->
  <div class="col ml-1 mr-3" id="graficaY">
  <div class="card card-info shadow-md">
    <div class="card-header bg-cetis2">
      <h3 class="card-title">Tramites por motivo</h3>
    </div>
    <div class="card-body">
      <canvas id="myChartCuatro"></canvas>
    </div>
  </div>
  </div>
  </div>
<!-- row -->
<!-- Fila 3 -->
<div class="row">
<div class="col ml-3 mr-1" id="graficaY">
<div class="card card-info shadow-md">
    <div class="card-header bg-cetis2">
      <h3 class="card-title">Tramites por grupo</h3>
    </div>
    <div class="card-body">
      <canvas id="myChartCinco"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
  </div>
<!-- descripción -->
<div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Descripción
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <dl>
                  <dt>Lista de descripción</dt>
                  <dd>Aqui deberia haber algo informativo para la orientadora.</dd>
                  <dt>no se que poner</dt>
                  <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                  <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                  <dt>Malesuada porta</dt>
                  <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                  <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                  <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                </dl>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>
<!-- row -->
        <div class="card shadow-md ml-3 mr-3">
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
                      <td>@if($tra->tipo->nombre == 'justificante')<span class="badge bg-cetis2">Justificante</span>@else<span class="badge bg-cetis">Pase de salida</span>@endif</td>
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
