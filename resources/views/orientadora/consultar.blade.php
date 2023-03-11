@extends('appOrientadora')

@section('titulo')
    <h1>Consultar Alumnos</h1>
@stop

@section('breadcrum')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Consultar Alumnos</li>
@stop

@section('contenido')
<!-- barra de busqueda -->
<div class="shadow-sm">
    <div class="input-group input-group-sm">
        <input class="form-control mr-sm-2" id="busquedaConsultar" type="search" placeholder="Filtrar alumnos..." aria-label="Search" onchange="BuscarAlumnos();">
        <div class="input-group-append">
            <!-- boton buscador icono -->
            <button class="btn btn-navbar bg-info shadow-sm" id="BotonBuscador">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="input-group-append">
        <!-- Borrar filtros :( -->
<a id="BotonFiltro" class="btn btn-secondary btn-sm" href="{{asset('tramites/consultar')}}">Borrar filtros</a>
</div>
    </div>
</div>
    <br>
    <div class="responsive-table">
        <table class="table table-sm table-hover" id="tabla">
            <thead>
                <tr>
                <!-- Nombre -->
                <th><div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" onclick="EnfocarBarraBusqueda();">
                    <b>Nombre</b>
                </button>
                </div>
            </th>
                    <!-- Especialidad -->
                <th><div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>Especialidad</b>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('tramites/consultar/especialidad', ['Especialidad' => 'ELECTRÓNICA'])}}">ELECTRÓNICA</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/especialidad', ['Especialidad' => 'OFIMÁTICA'])}}">OFIMÁTICA</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/especialidad', ['Especialidad' => 'PROGRAMACIÓN'])}}">PROGRAMACIÓN</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/especialidad', ['Especialidad' => 'CONTABILIDAD'])}}">CONTABILIDAD</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/especialidad', ['Especialidad' => 'CONSTRUCCIÓN'])}}">CONSTRUCCIÓN</a>
                </div>
                </div>
            </th>
            <!-- Grupo -->
            <th><div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>Grupo</b>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('tramites/consultar/grupo', ['Grupo' => '6',])}}">6 semestre</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/grupo', ['Grupo' => '4',])}}">4 semestre</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/grupo', ['Grupo' => '2',])}}">2 semestre</a>
                </div>
                </div>
            </th>
            <!-- Sexo -->
            <th><div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>Sexo</b>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('tramites/consultar/sexo', ['Sexo' => 'H',])}}">Masculino</a>
                    <a class="dropdown-item" href="{{url('tramites/consultar/sexo', ['Sexo' => 'M',])}}">Femenino</a>
                </div>
                </div>
            </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $a)
                <tr id="Alumno">
                    <td id="AlumnoTd">{{$a->nombre_completo}}</td>
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