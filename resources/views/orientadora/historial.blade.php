@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
<div class="row d-flex justify-content-end">
    <div class="input-group w-25">
      <input type="date" class="form-control border-top w-25" placeholder="Filtrar por fecha" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarAlumnosHistorial();">
    </div>
  <!-- fin input -->
    <div class="input-group-sm w-25 ml-2 mr-2">
      <input type="text" class="form-control border-top w-25" placeholder="Buscar alumno" id="busquedaHistorial" onchange="BuscarAlumnosHistorial();">
    </div>
  <!-- fin input -->
  <a href="{{url('historial')}}" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.65 6.35A7.958 7.958 0 0 0 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08A5.99 5.99 0 0 1 12 18c-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg></a>
</div>
<!-- fin row -->
<div class="row mt-2">
  <div class="col">
    <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
      <div class="card-header">
        <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.25 2.52l.77-1.28l-3.52-2.09V8z"/></svg> Historial de trámites</h3>
        <div class="card-tools">
        @if(Session::has('aceptado'))
          <a href="{{url('historial')}}" class="font-light-a a mr-2 cursor-pointer">Todos</a>
          <a href="{{url('historial/aceptados')}}" class="underline--magical a  mr-2 cursor-pointer">Aceptados</a>
          <a href="{{url('historial/rechazados')}}" class="font-light-a ml-1 cursor-pointer">Rechazados</a>
        @elseif(Session::has('rechazado'))
        <a href="{{url('historial')}}" class="font-light-a mr-2 cursor-pointer">Todos</a>
        <a href="{{url('historial/aceptados')}}" class="font-light-a mr-2 cursor-pointer">Aceptados</a>
        <a href="{{url('historial/rechazados')}}" class="underline--magical a mr-2 cursor-pointer">Rechazados</a>
        @else    
        <a href="{{url('historial')}}" class="underline--magical a mr-2 cursor-pointer">Todos</a>
        <a href="{{url('historial/aceptados')}}" class="font-light-a mr-2 cursor-pointer">Aceptados</a>
        <a href="{{url('historial/rechazados')}}" class="font-light-a ml-1 cursor-pointer">Rechazados</a>
        @endif
        </div>
        <br><br>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-sm" id="TablaHistorial">
<!--           <thead>
            <tr>
              <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6l9-4.91V17h2V9L12 3z"/></svg> Alumno</th>
              <th><i class="fas fa-file"></i> Trámite</th>
              <th><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zM9 14H7v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2zm-8 4H7v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z"/></svg> Fecha</th>
              <th>Estatus</th>
              <th></th>
            </tr>
          </thead> -->
          <tbody>
            @foreach ($tramites as $tra)
                  <tr>
                    <td width="15%">{{$tra->created_at->format('d/m/Y');}}</td>
                    <td width="30%"><span class="">@if($tra->tipo_id == 3) Justificante @else Pase de salida @endif por {{$tra->tramite_detalle->motivo}}</span></td>
                    <td width="40%"><a class="ml-1 text-secondary style-2" href="{{url('perfil', $tra->alumno->nombre_completo)}}">{{$tra->alumno->nombre_completo}}</a></td>
                    <!-- <td>@if($tra->autorizado == 1)<span class="badge bg-primary">Aceptado</span> @else <span class="badge bg-danger">Rechazado</span>  @endif</td> -->
                    <td width="20%">@if($tra->autorizado == '1') <span class="badge bg-primary">Aceptado</span> @else <span class="badge bg-danger">Rechazado</span> @endif</td>
                    <td><a class="a span style-4" href="{{ url('tramite_detalle', $tra->id) }}" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6 6v2h8.59L5 17.59L6.41 19L16 9.41V18h2V6z"/></svg></a></td>
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
</div>
<!-- fin row -->
</div>
@stop