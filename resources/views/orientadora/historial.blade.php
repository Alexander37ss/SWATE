@extends('appOrientadora')

@section('titulo')
@stop

@section('breadcrum')
@stop

@section('contenido')
<div class="row">
  <div class="col-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.25 2.52l.77-1.28l-3.52-2.09V8z"/></svg> Historial de trámites</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-sm" id="TablaHistorial">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Alumno</th>
              <th>Motivo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tramites as $tra)
                  <tr class="cursor-pointer">
                    <td>{{$tra->created_at->format('d/m/Y');}}</td>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <!-- fin col -->
      <div class="col">
        <!-- input alumno -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <a class="btn btn-inactive cursor-default"  type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 10.5V6l-2.11 1.06A3.999 3.999 0 0 1 12 12a3.999 3.999 0 0 1-3.89-4.94L5 5.5L12 2l7 3.5v5h-1M12 9l-2-1c0 1.1.9 2 2 2s2-.9 2-2l-2 1m2.75-3.58L12.16 4.1L9.47 5.47l2.6 1.32l2.68-1.37M12 13c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-3 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg></a>
          </div>
          <input type="text" class="form-control" id="busquedaHistorial" placeholder="Escribe el nombre del alumno" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarAlumnosHistorial();">
        </div>
        <!-- input fecha -->
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <a class="btn btn-inactive cursor-default"  type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18ZM5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10Z"/></svg></a>
          </div>
          <input type="date" class="form-control" id="busquedaHistorial" placeholder="Filtrar por fecha" aria-label="Recipient's username" aria-describedby="basic-addon2" onchange="BuscarAlumnosHistorial();">
          <div class="input-group-append">
            </div>
          </div>
          <!-- borrar filtro(s) -->
          <div class="input-group">
            <a class="btn btn-outline-dark" href="{{ url('historial') }}" type="button">Borrar filtros</a>
          </div>
        </div>
        <!-- fin col -->
</div>
<!-- fin row -->
</div>
@stop