@extends('appAlumno')

@section('home')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="mb-2 card-title"><i class="far fa-clock"></i> Historial De Tramites</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="responsive-table">
            <table class="table table-sm table-hover table-striped" id="TablaHistorial">
                <thead>
                    <tr>                    <!-- Especialidad -->
                        <th>
                            <div class="dropdown">
                                <button class="btn bg-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>Tipo de tramite</b>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('alumno/home', ['tipo' => 2])}}">Pase De Salida</a>
                                    <a class="dropdown-item" href="{{url('alumno/home', ['tipo' => 3])}}">Justificante</a>
                                </div>
                            </div>
                        </th>
                        <th>Orientadora a cargo</th>
                        <th>Motivo</th>
                        <th>
                            <div class="dropdown">
                                <button class="btn bg-white dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>Fecha creada</b>
                                </button>
                                <div class="dropdown-menu pt-0 pb-0" aria-labelledby="dropdownMenuButton">
                                  <input class="form-control" id="busquedaFecha" type="date" placeholder="YYYY-MM" aria-label="Search" onchange="BuscarFecha();">
                                </div>
                            </div>
                        </th>
                        <th>Dia(s) solicitados</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach ($justificantes as $just)
                      <tr>
                          <td>{{$just->tipo->nombre}}</td>
                          <td>{{$just->user->name}}</td>
                          <td>
                            @if ($just->tramite_detalle->motivo != 'Otro...')
                              {{$just->tramite_detalle->motivo}}
                            @else
                              {{$just->tramite_detalle->motivo_otro}}
                            @endif
                          </td>
                          <td>{{$just->tramite_detalle->fecha_solicitada}}</td>
                          <td>                              
                            @if ($just->tramite_detalle->del == $just->tramite_detalle->al)
                              {{$just->tramite_detalle->del}}
                            @else
                              {{$just->tramite_detalle->del}} - {{$just->tramite_detalle->al}}
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








