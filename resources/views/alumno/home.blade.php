@extends('appAlumno')

@section('titulo')
@stop

@section('contenido')
<?php 
    $meses = [
        "01" => 'Enero',
        "02" => 'Febrero',
        "03" => 'Marzo',
        "04" => 'Abril',
        "05" => 'Mayo',
        "06" => 'Junio',
        "07" => 'Julio',
        "08" => 'Agosto',
        "09" => 'Septiembre',
        "10" => 'Octubre',
        "11" => 'Noviembre',
        "12" => 'Diciembre'
    ];
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
        <h5 class="text-center">Últimos justificantes <span class="text-success">aceptados</span></h5>
        <hr>
        <br>
        <div class="row">
          @foreach ($nuevosJustificantes as $just)
          <div class="card col ml-2" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
            <div class="card-header">
              <h3 class="card-title">Justificante {{$numJustificantes}}</h3>
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
            Tú justificante por motivos de 
            @if ($just->tramite_detalle->motivo != 'Otro...')
              {{$just->tramite_detalle->motivo}}
              @else
              {{$just->tramite_detalle->motivo_otro}}
              @endif
            
            que abarca los dias del @if ($just->tramite_detalle->del == $just->tramite_detalle->al)
                              {{$just->tramite_detalle->del}}
                            @else
                              {{$just->tramite_detalle->del}} al {{$just->tramite_detalle->al}}
                            @endif 
            fue aceptado por la orientadora {{$just->user->name}}.
          </div>
          <hr class="my-0">
          <!-- /.card-body -->
          <div class="card-footer">
          {{$just->tramite_detalle->created_at->format('d')}} de <?php echo($meses[ $mes[$i] ]);?> del {{$just->tramite_detalle->created_at->format('Y')}}
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
                  <?php
                  --$numJustificantes;
                  $i++;
                  ?>
                  @endforeach
                </div>
                <!-- fin row -->
                <br>
                <div class="card" style="border-radius: 10px 10px 10px 10px !important; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                  <div class="card-header">
                    <h3 class="mb-2 card-title"><i class="far fa-clock"></i> Historial De Tramites</h3>
                    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        
        <div class="card-body p-0">
          <div class="responsive-table">
            <table class="table table-sm" id="TablaHistorial">
                <thead>
                    <tr>
                        <th>Orientadora</th>
                        <th>Motivo</th>
                        <th>Fecha creada</th>
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
                              {{$just->tramite_detalle->del}} al {{$just->tramite_detalle->al}}
                            @endif
                          </td>
                          <td>
                                <a title="Descargar PDF" class="btn btn-success btn-sm" style="color: white;" href="{{url('descargar/qr', $just->id)}}">
                                <i class="fas fa-download"></i>
                                </a>
                                <a title="Descargar QR" class="btn btn-primary btn-sm" style="color: white;" href="{{url('crear/qr', $just->id)}}">
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
</div> 
@stop