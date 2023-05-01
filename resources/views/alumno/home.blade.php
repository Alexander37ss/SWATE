@extends('appAlumno')

@section('titulo')
@stop

@section('contenido')
<?php 
  $i = 0;
?>
<label class="inactive" id="numeroJustificantes">{{$numJustificantes}}</label>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <!-- Default box -->
      @if(session('status'))
      <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Realizado con éxito!</h5>
                  {{ session('status') }}
                </div>
        @endif
        <div class="callout callout-success" id="alerta">
                  <h5>Nuevo justificante aceptado!</h5>

                  <p>Descarga o usa el codigo QR para justificar tus faltas.</p>
                </div>
        <h5>Últimos tramites <label class="text-success font-italic">aceptados</label></h5>
        <div class="row">
          @foreach ($justificantes as $just)
          <div class="card col ml-2 card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">Justificante #{{$numJustificantes}}</h3>
              <div class="card-tools">
              <a title="Descargar PDF" class="btn badge badge-success" style="color: white;" href="{{url('descargar/qr', $just->id)}}">
                  <i class="fas fa-download"></i>
              </a>
              <a title="Descargar QR" class="btn badge badge-primary" style="color: white;" href="{{url('crear/qr', $just->id)}}">
                  <i class="fas fa-qrcode"></i>
              </a>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            Tu justificante por motivos de 
            <b>@if ($just->tramite_detalle->motivo != 'Otro...')
              {{$just->tramite_detalle->motivo}}
              @else
              {{$just->tramite_detalle->motivo_otro}}
              @endif
            </b>
            que abarca los dias del <b>@if ($just->tramite_detalle->del == $just->tramite_detalle->al)
                              {{$just->tramite_detalle->del}}
                            @else
                              {{$just->tramite_detalle->del}} al {{$just->tramite_detalle->al}}
                            @endif </b>
            fue aceptado por la orientadora <b>{{$just->user->name}}</b>.
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            {{$just->tramite_detalle->fecha_solicitada}}
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        @if(++$i == 3) 
        <?php 
                  break;
                  ?>
                  @endif
                  <?php
                  --$numJustificantes;
                  ?>
                  @endforeach
                </div>
                <!-- fin row -->
                <br>
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
                    <tr>
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
                        <th>Descargar</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach ($justificantes as $just)
                      <tr>
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
                          <td>
                                <a title="Descargar QR" class="btn" style="color: white; background-color: #a7201f;" href="{{url('crear/qr', $just->id)}}">
                                  <i class="fas fa-qrcode"></i>
                                </a>
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