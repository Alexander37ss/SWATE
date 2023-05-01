@extends('appOrientadora')

@section('titulo')
<h4><i class="fas fa-clock mr-1"></i> Historial De Trámites</h4>
@stop

@section('breadcrum')
<li class="breadcrumb-item"><a href="{{ url('/home') }}" class="lopez">Inicio</a></li>
<li class="breadcrumb-item active">Historial de trámites</li>
@stop

@section('contenido')
<div class="card shadow-md mr-4 ml-3 border-radius-0">
          <div class="card-body">
            <!-- barra de busqueda -->
            <div class="shadow-sm">
              <div class="input-group input-group-sm">
                <input class="form-control mr-sm-2" id="busquedaHistorial" type="search" placeholder="Escribe el nombre del alumno..." aria-label="Search" onchange="BuscarAlumnosHistorial();">
                <div class="input-group-append">
                  <button class="btn btn-navbar shadow-sm" id="busquedaBotonHistorial" style="background-color: #a7201f;">
                    <i class="fas fa-search link-activo"></i>
                  </button>
                </div>
                <div class="input-group-append">
                  <a id="BotonFiltroHistorial" class="btn btn-secondary btn-sm border-radius-0" href="{{url('historial')}}"><i class="fas fa-trash"></i></a>
                </div>
            </div>
          </div>
          <!-- fin barra de busqueda -->
          <br>
          <!-- TABLA -->
          <div class="responsive-table">
            <table class="table table-sm table-hover " id="TablaHistorial">
                <thead>
                  <tr>
                  <th>
                            <div class="dropdown">
                              <a class="bg-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <b>Fecha creada</b><i class="fa fa-caret-down ml-2"></i>
                              </a>
                                <div class="dropdown-menu pt-0 pb-0" aria-labelledby="dropdownMenuButton">
                                  <input class="form-control" id="busquedaFecha" type="date" placeholder="YYYY-MM" aria-label="Search" onchange="BuscarFecha();">
                                </div>
                              </div>
                        </th>
                    <th>Alumno</th>
                    <th>Motivo</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($tramites as $tra)
                    <tr>
                        <td>{{$tra->tramite_detalle->fecha_solicitada}}</td>
                      <td>{{$tra->alumno->nombre_completo}}</td>
                      <td>
                        @if ($tra->tramite_detalle->motivo != 'Otro...')
                                {{$tra->tramite_detalle->motivo}}
                              @else
                                {{$tra->tramite_detalle->motivo_otro}}
                                @endif
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="text-center">
                      {{$tramites->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop