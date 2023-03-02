@extends('app')

@section('titulo')
    <h1>Consultar Alumnos</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Consultar Alumnos</li>
@stop

@section('contenido')
    <div class="responsive-table">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Grupo</th>
                    <th>Sexo</th>
                    <th>Tramites</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $a)
                <tr>
                    <td>{{$a->nombre_completo}}</td>
                    <td>{{$a->carrera}}</td>
                    <td>{{$a->grupo}}</td>
                    <td>
                        @if ($a->sexo == 'M')
                            Femenino
                        @else
                            Masculino
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('constancia/pdf', $a->nombre_completo) }}" class="btn btn-info btn-sm">
                            <i class="far fa-file-pdf"></i>
                        </a>
                        <a href="{{ url('tramites/pase_salida', $a->nombre_completo) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-door-open"></i>
                        </a>
                        <a href="{{ url('tramites/justificanteOrientadora', $a->nombre_completo) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-file-contract"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
