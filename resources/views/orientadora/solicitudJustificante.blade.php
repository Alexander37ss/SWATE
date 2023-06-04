@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')

@stop

@section('contenido')
<div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <div class="card-header">
        <span>Solicitudes de alumnos</span>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
      <table class="table table-sm">
            <tbody>
                @foreach ($pre_justificantes as $pre)
                <tr class="bg-cetis-table font-apple">
                        <td><svg class="text-blue" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6Z"/></svg><a class="ab-underline cursor-pointer" style="font-size: 15px;" href="{{ url('tramites/solicitudJustificante', $pre->id) }}">Ver detalles</a></td>
                        <td class="text-center pb-2 pt-1"> <a class="a-underline text-capitalize" style="font-size: 15px;" href="{{url('perfil', $pre->alumno->nombre_completo)}}">{{$pre->alumno->nombre_completo}}</a></td></td>
                        <td><span class="float-right text-secondary mr-3">@if($pre->motivo == 'Otro'){{$pre->motivo_otro}} @else {{$pre->motivo}} @endif</span></td>     
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
@stop
