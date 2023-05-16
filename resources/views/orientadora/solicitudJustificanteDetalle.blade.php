@extends('appOrientadora')

@section('titulo')
    <h1>Solicitud justificante</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="lopez">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitud justificante</li>
@stop

@section('contenido')
<?php 
    $meses = [
        "1" => 'ENERO',
        "2" => 'FEBRERO',
        "3" => 'MARZO',
        "4" => 'ABRIL',
        "5" => 'MAYO',
        "6" => 'JUNIO',
        "7" => 'JULIO',
        "8" => 'AGOSTO',
        "9" => 'SEPTIEMBRE',
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
                    <b>Se desea justificar los día(s):</b>
                    <br>
                        @for ($i = $datosSolicitud->del; $i <=$datosSolicitud->al; $i++){{ $i }}, @endfor 
                        DE <?php echo($meses[ $mes ]);?>
                        del <?php echo($ano);?></b>.
                        
                    <br><br>
                </div>
                     
                <!-- /.card-body -->
                
            <!-- Alumno -->
                  <div class='form-group ml-4'>
                    <a href="{{asset('/tramites/solicitudJustificante')}}" class="btn bg-cetis inactive" id="regresar"> Regresar </a> 
                  </div>
                  <div class="form-group ml-4" id="botonesDetalle">
                    <a href="{{ url('tramites/solicitudAceptarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-cetis">Confirmar</a>
                    <a href="{{ url('tramites/solicitudDescargarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-cetis" id="refresh">Confirmar y Descargar</a>
                    <a href="{{ url('tramites/solicitudDenegarJustificante')}}/{{$datosAlumno->nombre_completo}}/{{$datosSolicitud->id}}" class="btn bg-cetis">Denegar</a>
                  </div>
              </div>
      </div>
  </div>
<script src="{{ asset('jsswate/main.js') }}"></script>
@stop
