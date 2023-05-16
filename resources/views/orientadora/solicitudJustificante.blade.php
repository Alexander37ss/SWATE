@extends('appOrientadora')

@section('titulo')
    <h1>Solicitudes de justificantes</h1>
@stop

@section('breadcrum')

@stop

@section('contenido')
    <div class="responsive-table">
        <table class="table table-sm table-hover table-striped">

            <thead>
                <tr>
                    <th>Ver detalle</th>
                    <th>Nombre</th>
                    <th>Motivo</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pre_justificantes as $pre)
                        <td><a href="{{ url('tramites/solicitudJustificante', $pre->id) }}" class="lopez">Más detalle</a></td>
                        <td>{{$pre->alumno->nombre_completo}}</td>
                        <td>@if($pre->motivo == 'Otro'){{$pre->motivo_otro}} @else {{$pre->motivo}} @endif</td>     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
