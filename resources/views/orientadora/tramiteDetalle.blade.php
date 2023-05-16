@extends('appOrientadora')

@section('titulo')
<h3 class="ml-4">Detalles del trámite #{{$datosSolicitud->id}}</h3>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="lopez">Inicio</a></li>
    <li class="breadcrumb-item active">Detalles de trámite</li>
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
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 50rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><label>Alumno:</label> {{ $datosAlumno->nombre_completo }}</li>
                        <li class="list-group-item"><label>Tipo de trámite:</label> @if($datosSolicitud->tipo_id == 3) Justificante @else Pase de salida @endif</li>
                        <li class="list-group-item"><label>Motivo: </label> @if($datosSolicitud->tramite_detalle->motivo == 'Otro'){{$datosSolicitud->tramite_detalle->motivo_otro}} @else {{$datosSolicitud->tramite_detalle->motivo}} @endif</li>
                        <li class="list-group-item"><label>Dias justificados: </label>                         @for ($i = $datosSolicitud->tramite_detalle->del; $i <=$datosSolicitud->tramite_detalle->al; $i++) @if($i == $datosSolicitud->tramite_detalle->al) y {{ $i }} @else {{$i}}, @endif @endfor  de <b><?php echo($meses[ $mes ]);?></b> del <b><?php echo($ano);?></b>.</li>
                        <li class="list-group-item"><label>Fecha de registro: </label> {{$datosSolicitud->created_at->format('d/m/Y');}}</li>
                    </ul>
                </div>
            </div>
            <div class="col text-center m-auto" height="50rem" width="full">
                Descargar @if($datosSolicitud->tipo_id == 3) justificante @else pase de salida @endif
                <br>
                <a class="btn btn-danger mt-1" href="{{url('descargar/qr', $datosSolicitud->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 20q-.825 0-1.413-.588T4 18v-3h2v3h12v-3h2v3q0 .825-.588 1.413T18 20H6Zm6-4l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11l-5 5Z"/></svg></a>
            </div>
        </div>
  </div>
@stop
