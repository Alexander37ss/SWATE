@extends('appOrientadora')

@section('titulo')
    <h1>Historial Justificantes</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Justificantes de {{auth()->user()->name}}</li>
@stop

@section('contenido')
    <div class="responsive-table">
        <table class="table table-hover">

            <thead class="thead-dark">
                <tr>
                    <th>Nombre Alumno</th>
                    <th>Motivo</th>
                    <th>Fecha Creada</th>
                    <th>Dia(s) solicitados</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($justificantes as $just)
                    <tr>
                        <td>{{$just->alumno->nombre_completo}}</td>
                        <td>{{$just->tramite_detalle->motivo}}</td>
                        <td>{{$just->tramite_detalle->fecha_solicitada}}</td>
                        <td>{{$just->tramite_detalle->del}} - {{$just->tramite_detalle->al}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
