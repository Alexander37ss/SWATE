@extends('appOrientadora')

@section('titulo')
    <h1>Justificante</h1>
@stop

@section('breadcrum')
@stop

@section('contenido')
<link rel="stylesheet" href="{{asset('cssswate/main.css')}}">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('tramites/procesoJustificante')}}/{{$alumno->id}}" method="POST">
                @csrf
                <div class="card-body">
               <!-- Alumno -->
                <div class = "form-group">
                <label for="">Alumno:</label>
                <input name="nombre" type="text" class= "form-control" disabled value="{{ $alumno -> nombre_completo}}">
                </div>
                <!-- Motivo -->
                <div class="form-group">
                  <label for="exampleSelectBorder">Motivo:</label>
                  <select name="motivo" class="custom-select form-control-border" id="MotivoJustificante" onchange="AparecerOtroMotivoJustificante()" required>
                    <option>Escoge un motivo...</option>
                    <option value="Motivo de salud">Motivo de salud</option>
                    <option value="Motivo vacacional">Motivo vacacional</option>
                    <option value="Motivo de perdida">Motivo de perdida</option>
                    <option value="Otro">Otro...</option>
                  </select>
                </div>
                <!-- Otro... -->
                  <div class="form-group inactive" id="OtroMotivoJustificante">
                        <label>Otro:</label>
                        <textarea class="form-control" name="otro" rows="3" placeholder="Escribe..."></textarea>
                      </div>
                <div class="row">
                        <!-- Del -->
                        <div class="form-group mr-5 ml-1">
                            <label for="exampleFormControlSelect2">Del día:</label>
                            <select name="del" multiple class="form-control" id="exampleFormControlSelect2" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
            </select>
        </div>
        <!-- Al -->
        <div class="form-group">
            <label for="exampleFormControlSelect2">Al día:</label>
            <select name="al" multiple class="form-control" id="exampleFormControlSelect2" required>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
            </select>
        </div>
      </div>
    </div>
    <!-- card body -->
    <div class="card-footer">
      <button type="submit" class="btn bg-cetis">Confirmar</button>
    </div>
  </form>
</div>
<script src="{{ asset('jsswate/justificanteOrientadora.js') }}"></script>

@stop
