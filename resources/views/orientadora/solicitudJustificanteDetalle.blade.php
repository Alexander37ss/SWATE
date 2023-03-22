@extends('appOrientadora')

@section('titulo')
    <h1>Solicitar justificante</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="lopez">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitar justificante</li>
@stop

@section('contenido')
<?php 
    $meses = [
        "01" => 'ENERO',
        "02" => 'FEBRERO',
        "03" => 'MARZO',
        "3" => 'MARZO',
        "04" => 'ABRIL',
        "05" => 'MAYO',
        "06" => 'JUNIO',
        "07" => 'JULIO',
        "08" => 'AGOSTO',
        "09" => 'SEPTIEMBRE',
        "10" => 'OCTUBRE',
        "11" => 'NOVIEMBRE',
        "12" => 'DICIEMBRE'
    ];
?>
<?php
 if($fdsfa = "{{ }}")
?>
<link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
            <div class="card-body">
            <!-- Alumno -->
            <div class = "form-group">
              <label for="">Alumno:</label>
              <input name="nombre" type="text" class= "form-control" disabled value="{{ $datosAlumno->nombre_completo }}">
            </div>
                <!-- Motivo -->
                <div class="form-group">
                    <label for="exampleSelectBorder">Motivo:</label>
                        <input name="nombre" type="text" class= "form-control" disabled value="@if($datosSolicitud->motivo == 'Otro'){{$datosSolicitud->motivo_otro}} @else {{$datosSolicitud->motivo}} @endif">
                </div>

                <!-- Otro... -->
                <div class="form-group inactive" id="OtroMotivo">
                    <label>Otro:</label>
                  </div>
                </div>

                <div class="form-group ml-4">
                    <!-- Del -->
                    </b>Se desea justificar los día(s):<b>
                        @for ($i = $datosSolicitud->del; $i <=$datosSolicitud->al; $i++){{ $i }}, @endfor 
                        DE <?php echo($meses[ $mes ]);?>
                        del <?php echo($ano);?></b>.
                        
                    <br><br>
                </div>
                     
                <!-- /.card-body -->
                <div class="form-group ml-4">
                  <a href="{{ url('tramites/solicitudAceptarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-cetis">Confirmar</a>
                  <a href="{{ url('tramites/solicitudDescargarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-cetis">Confirmar y Descargar</a>
                  <a href="{{ url('tramites/solicitudDenegarJustificante')}}/{{$datosSolicitud->id}}" class="btn bg-cetis">Denegar</a>
                </div>
        </div>
      </div>
  </div>
<script src="{{ asset('jsswate/main.js') }}"></script>
@stop
