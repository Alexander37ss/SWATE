@extends('appAlumno')

@section('titulo')
@stop

@section('breadcrum')
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
    $i = 0;
?>
@if(Session::has('no_solicitud')) 
  <h3 class="text-center text-secondary"><i class="far fa-folder-open"></i> Aún no hay ninguna solicitud</h3>
@else

@foreach($preJustificante as $a)
<div class="card mb-1 mt-1 shadow-sm">
      <!-- /.card-header -->
      <div class="card-header">
        <div class="card-title font-bold">
          {{$a->created_at->format('d')}} <?php echo($meses[ $mes[$i] ]);?> del {{$a->created_at->format('Y')}}
        </div>
        <div class="card-tools">
          <a href="{{url('alumno/misSolicitudes/editar', $a->id)}}"  class="btn btn-success a text-white"><i class="fas fa-pen"></i></a>
          <a href="{{url('alumno/misSolicitudes/cancelar', $a->id)}}" class="btn btn-danger a text-white"><i class="fas fa-ban"></i></a>
        </div>
      </div>
      <div class="card-body">
          Justificante por motivos de @if($a->motivo == 'Otro'){{$a->motivo_otro}} @else {{$a->motivo}} @endif esta pendiente de revisión.
            </div>
            <!-- /.card-body -->
          <!-- /.card -->
          </div>
          <br>
          <?php $i++; ?>
          @endforeach

        @endif

@stop
