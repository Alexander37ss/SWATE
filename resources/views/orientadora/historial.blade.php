@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
<span class="inactive" id="fecha">{{$fecha}}</span>
<div class="row mt-2">
  <div class="col-9">
    <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <div class="card-header">
        <span id="resultadosHistorial">{{$tramites->count();}}</span> resultados de {{$tramites->count();}}
        <div class="card-tools">
        @if(Session::has('aceptado'))
        <a href="{{url('historial')}}" class="font-light-a mr-2 cursor-pointer">Todos</a>
          <a href="{{url('historial/aceptados')}}" class=" a  mr-2 cursor-pointer">Aceptados</a>
          <a href="{{url('historial/rechazados')}}" class="font-light-a ml-1 cursor-pointer">Rechazados</a>
          @elseif(Session::has('rechazado'))
          <a href="{{url('historial')}}" class="font-light-a mr-2 cursor-pointer">Todos</a>
        <a href="{{url('historial/aceptados')}}" class="font-light-a mr-2 cursor-pointer">Aceptados</a>
        <a href="{{url('historial/rechazados')}}" class=" a ml-1 cursor-pointer">Rechazados</a>
        @else    
        <a href="{{url('historial')}}" class=" a mr-2 cursor-pointer">Todos</a>
        <a href="{{url('historial/aceptados')}}" class="font-light-a mr-2 cursor-pointer">Aceptados</a>
        <a href="{{url('historial/rechazados')}}" class="font-light-a ml-1 cursor-pointer">Rechazados</a>
        @endif
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-sm" id="TablaHistorial">
          <thead>
            <tr>
              <!-- <th>Acciones</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach ($tramites as $tra)
            <tr class="bg-cetis-table font-apple">
                    <td> <svg class="text-blue" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6Z"/></svg><a class="ab-underline cursor-pointer" style="font-size: 15px;" href="{{ url('tramite_detalle', $tra->id) }}">@if($tra->tipo_id == 3) Justificante  @else Pase de salida  @endif </a></td>
                    <td class="text-center pb-2 pt-1"><a class="a-underline text-capitalize" style="font-size: 15px;" href="{{url('perfil', $tra->alumno->nombre_completo)}}">{{$tra->alumno->nombre_completo}}</a></td>
                    <td><span class="float-right text-secondary mr-3" style="font-size: 15px;">{{$tra->created_at->format('d/m/Y');}}</span></td>
                    <td class="inactive">{{$tra->created_at->format('Y-m-d');}}</td>
                    <!-- <td>@if($tra->autorizado == 1)<span class="badge bg-primary">Aceptado</span> @else <span class="badge bg-danger">Rechazado</span>  @endif</td> -->
                    <!-- <td width="10%" class="text-center"><a class="a span style-4" href="{{ url('tramite_detalle', $tra->id) }}" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6 6v2h8.59L5 17.59L6.41 19L16 9.41V18h2V6z"/></svg></a></td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <!-- fin col -->
      <div class="col">
      <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <div class="card-header">
        <div class="card-title">
          Filtros
        </div>  
      </div>
      <div class="card-body">
        <div class="input-group mb-3">
          <input type="text" class="input-github container-fluid"  placeholder="Buscar alumno" id="busquedaHistorial" onchange="BuscarAlumnosHistorial();">
        </div>
        <!-- fin input -->
        <hr>
        <div class="input-group">
          <input type="date" class="input-github container-fluid" placeholder="Filtrar por fecha" id="busquedaFecha" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarFecha();">
        </div>
        <!-- fin input -->
      
        <div class="dropdown show mt-2 mb-2" align="center">
      <a class="btn-github a dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Filtrar por rango de fecha
      </a>
      
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <button class="dropdown-item" href="#" onclick="hoyHistorial();">Hoy</button>
          <button class="dropdown-item" href="#">Esta semana</button>
          <button class="dropdown-item" href="#">Este mes</button>
          <button class="dropdown-item" href="#">Este año</button>
        </div>
      </div>
      <br>
      <hr>
      <a href="{{url('historial')}}" class="btn-github a"><i class="fas fa-trash mr-1"></i> Borrar filtros</a>
        </div>
      </div>
      <!-- fin card body -->  
      <!-- fin filtros-->
      </div>
</div>
<!-- fin row -->
</div>
@stop