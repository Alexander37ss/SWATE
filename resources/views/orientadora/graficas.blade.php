@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="lopez">Inicio</a></li>
    <li class="breadcrumb-item active">Información</li>
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
<label class="inactive" id="justificanteAno">{{$justificantesAno}}</label>
<label class="inactive" id="justificanteMes">{{$justificantesMes}}</label>
<label class="inactive" id="paseSalidaAno">{{$paseSalidaAno}}</label>
<label class="inactive" id="paseSalidaMes">{{$paseSalidaMes}}</label>
<!-- Saludo al usuario -->
<div class="row">
    <div class="col ml-2 mr-2">
        <div class="card shadow-border">
            <div class="card-header">
            <h5 class="card-title m-0">Información destacada</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- col -->
                <div class="col-md-3">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
                        
                        <div class="info-box-content">
                            <span class="info-box-text">Estudiantes</span>
                            <span class="info-box-number">{{$alumnosNum}}</span>
                        </div>
                    </div>
                        <!-- /.info-box-content -->
                    </div>
                <!-- col -->
                <div class="col-md-3">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
                    
                        <div class="info-box-content">
                        <span class="info-box-text">Trámites este año</span>
                        <span class="info-box-number">{{$tramitesNumAno}}</span>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
                <!-- col -->
                <div class="col-md-3">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon bg-primary"><i class="far fa-calendar"></i></span>
                    
                        <div class="info-box-content">
                        <span class="info-box-text">Trámites este mes</span>
                        <span class="info-box-number">{{$justificantesMes}} <span class='font-size-low font-light'>@if($diferenciaMeses > 0)<i class="fas fa-arrow-up" style="color: green;"></i> {{$diferenciaMeses}} más que el mes anterior</span> @elseif($diferenciaMeses < 0) <i class="fas fa-arrow-down" style="color: red;"></i> {{$diferenciaMeses}} menos que el mes anterior @else Igual que el mes anterior @endif</span></span>
                    </div>
                </div>
                </div>
                    <!-- /.info-box-content -->
                <!-- col -->
                <div class="col-md-3">
                    <div class="info-box shadow-none">
                        @if($hora > 19) <span class="info-box-icon bg-dark"><i class="fas fa-moon"></i></span> @else <span class="info-box-icon bg-yellow-custom"><i class="fas fa-sun"></i></span> @endif
                    
                        <div class="info-box-content">
                        <span class="info-box-text">Trámites del día</span>
                        <span class="info-box-number">{{$justificantesDia}}</span>
                    </div>
                </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- row -->
            </div>
        </div>
    </div>
</div>
<!-- Grafica este año -->
<div class="row">
  <div class="col-md-4" id="graficaY">
    <div class="card shadow-border ml-3">
      <div class="card-header">
        <h3 class="card-title">Tipos de trámites (este año)</h3>
        <div class="card-tools">
          <div class="dropdown">
            <a type="button" id="dropdownMenuButton" class="tipo-card" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-caret-down mr-2 tipo-card"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item btn" style="color: black;"  id="graficaYear">Este año</a>
              <a class="dropdown-item btn" style="color: black;" id="graficaMonth">Este mes</a>
            </div>
            <!-- minimizar -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
                  </button>
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
  <div class="col-md-4 inactive" id="graficaM">
      <div class="card shadow-border ml-3 ">
      <div class="card-header">
        <h3 class="card-title">Tipos de trámites (este mes)</h3>
        <div class="card-tools">
          <div class="dropdown">
    <a type="button" id="dropdownMenuButton" class="tipo-card" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-caret-down mr-2 tipo-card"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item btn" style="color: black;"  id="graficaYearDos">Este año</a>
      <a class="dropdown-item btn" style="color: black;" id="graficaMonthDos">Este mes</a>
      </div>
                  <!-- minimizar -->
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
    </div>
    <!-- fin dropdown -->
    </div>     
    </div>
    <div class="card-body">
      <canvas id="myChartDos"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
</div>
  <div class="col-md-4">
  <div class="card shadow-border">
      <div class="card-header">
        <h3 class="card-title">Trámites por grupo</h3>
        <div class="card-tools">
                      <!-- minimizar -->
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
  </div>
      </div>
      <div class="card-body">
        <canvas id="myChartCinco"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
    </div>
  <!-- Grafica por motivos -->
  <div class="col-md-4">
  <div class="card shadow-border mr-3">
    <div class="card-header">
      <h3 class="card-title">Trámites por motivo</h3>
      <div class="card-tools">
                    <!-- minimizar -->
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
</div>
    </div>
    <div class="card-body">
      <canvas id="myChartCuatro"></canvas>
    </div>
  </div>
  </div>
  <div class="col ml-5 mr-5 p-6">
    <div class="card shadow-border collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Trámites a lo largo del año</h3>
        <div class="card-tools">
          <!-- minimizar -->
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChartTres"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@stop
  