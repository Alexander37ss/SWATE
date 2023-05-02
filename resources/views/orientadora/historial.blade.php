@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
<li class="breadcrumb-item"><a href="{{ url('/home') }}" class="lopez">Inicio</a></li>
<li class="breadcrumb-item active">Historial de trámites</li>
@stop

@section('contenido')
<!-- barra de busqueda -->
<!-- fin barra de busqueda -->
<div class="card py-1 px-1 bg-black mr-2 ml-3 mb-0 rounded-0">
</div>
<div class="card shadow-border mr-2 ml-3 border-radius-0">
<div class="card-header">
<h5><i class="far fa-clock mr-2"></i>Historial de trámites</h5>
  <div class="card-title float-right mr-4">
    <div class="input-contain">
      <input type="text" id="busquedaHistorial" name="fname" autocomplete="off" value="" aria-labelledby="placeholder-fname" onchange="BuscarAlumnosHistorial();">
      <label class="placeholder-text" for="fname" id="placeholder-fname">
        <span class="text">Buscar alumno</span>
      </label>
      <a class="color-trash" href="{{ url('historial') }}"><i class="fas fa-trash trash-place cursor-pointer" id="borrarFiltroDinamico"></i></a>
    </div>
  </div>
</div>
  <div class="card-body">
    <!-- TABLA -->
    <div class="responsive-table">
      <table class="table table-borderless table-sm table-hover " id="TablaHistorial">
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
                  <tr class="cursor-pointer">
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
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop