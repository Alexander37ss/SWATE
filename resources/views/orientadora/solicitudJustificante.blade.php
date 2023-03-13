@extends('appOrientadora')

@section('titulo')
    <h1>Solicitudes de justificantes</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Solicitudes pendientes</li>
@stop

@section('contenido')
    <div class="responsive-table">
        <table class="table table-hover">

            <thead class="thead-dark">
                <tr>
                    <th>Ver detalle</th>
                    <th>Nombre</th>
                    <th>Efectuar</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pre_justificantes as $pre)
                        <td><a href="{{ url('tramites/solicitudJustificante', $pre->id) }}">Más detalle</a></td>
                        <td>{{$pre->alumno->nombre_completo}}</td>
                        <td>@if($pre->motivo == 'Otro'){{$pre->motivo_otro}} @else {{$pre->motivo}} @endif</td>     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
