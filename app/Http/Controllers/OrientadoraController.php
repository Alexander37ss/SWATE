<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Pre_justificante;
use App\Models\tramite_detalle;
use App\Models\tramite;


class OrientadoraController extends BaseController
{
    function historial(){
        $alumnosNum = Alumno::all()->count();
        $fecha = Carbon::now();
        $hora = $fecha->format('H');
        $dia = $fecha->format('d');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        $tramitesNumAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
        ->whereYear('created_at', '=', $ano)
        ->get()->count();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

            //info de tramites
            $tramites = tramite::where('orientadora_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
            $justificantesMes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $justificantesAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $paseSalidaMes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $paseSalidaAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereYear('created_at', '=', $ano)
            ->get()->count();


            return view('orientadora.historial', compact('tramites', 'justificantesMes', 'justificantesAno', 'paseSalidaMes', 'paseSalidaAno', 'mes', 'ano', 'preJustificantes', 'pre_justificantes'));
    }
    function grafica(){
        $alumnosNum = Alumno::all()->count();
        $fecha = Carbon::now();
        $hora = $fecha->format('H');
        $dia = $fecha->format('d');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        $tramitesNumAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
        ->whereYear('created_at', '=', $ano)
        ->get()->count();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

            //info de tramites
            $tramites = tramite::where('orientadora_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
            $justificantesMes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $justificantesDia = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereDay('created_at', '=', $dia)
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $justificantesMesAtras = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', '=', $mes-1)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $justificantesAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $paseSalidaMes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $paseSalidaAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereYear('created_at', '=', $ano)
            ->get()->count();

            //info meses
            $enero = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '01')
            ->get()->count();
            $febrero = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '02')
            ->get()->count();
            $marzo = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '03')
            ->get()->count();
            $abril = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '04')
            ->get()->count();
            $mayo = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '05')
            ->get()->count();
            $junio = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '06')
            ->get()->count();
            $julio = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '07')
            ->get()->count();
            $agosto = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '08')
            ->get()->count();
            $septiembre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '09')
            ->get()->count();
            $octubre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '10')
            ->get()->count();
            $noviembre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '11')
            ->get()->count();
            $diciembre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '12')
            ->get()->count();
            /* motivo */
            $motivoVacacional = tramite_detalle::where('motivo', 'Motivo vacacional')
            ->get()->count();
            $motivoSalud = tramite_detalle::where('motivo', 'Motivo de salud')
            ->get()->count();
            $motivoPerdida = tramite_detalle::where('motivo', 'Motivo de perdida')
            ->get()->count();
            $motivoOtro = tramite_detalle::where('motivo', 'Otro...')
            ->get()->count();
            /* grupo */
            $grupoDos = Pre_justificante::where('grupo', 2)->get()->count();
            $grupoCuatro = Pre_justificante::where('grupo', 4)->get()->count();
            $grupoSeis = Pre_justificante::where('grupo', 6)->get()->count();
            /* calculos */
            $diferenciaMeses = $justificantesMes-$justificantesMesAtras;


            return view('orientadora.graficas', compact('diferenciaMeses', 'hora', 'justificantesDia', 'grupoDos', 'tramitesNumAno', 'alumnosNum', 'grupoCuatro', 'grupoSeis', 'motivoVacacional', 'motivoSalud', 'motivoPerdida', 'motivoOtro','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre', 'tramites', 'justificantesMes', 'justificantesAno', 'paseSalidaMes', 'paseSalidaAno', 'mes', 'ano', 'preJustificantes', 'pre_justificantes'));
    }
    # Funciones para visualizar la vista consultar y sus filtros
    public function consultar(){
        //consultas el alumno
        $alumnos = Alumno::all();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.consultar', compact('alumnos', 'preJustificantes', 'pre_justificantes'));
    }
    function consultarEspecialidad($especialidad){
        $alumnos = Alumno::where('carrera', $especialidad)->get();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.consultar', compact('alumnos', 'preJustificantes', 'pre_justificantes'));
    }
    function consultarGrupo($grupo){
        $alumnos = Alumno::where('grupo', 'LIKE', '%'.$grupo.'%')->get();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.consultar', compact('alumnos', 'preJustificantes', 'pre_justificantes'));
    }

    # Creación de justificante 
    function justificanteOrientadora($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.justificanteOrientadora', compact('alumno', 'preJustificantes', 'pre_justificantes'));
    }
    function justificanteOrientadoraPDF($id){
        $alumno = Alumno::find($id);
        
        # Guardamos los datos del formulario a request
        $motivo = Request('motivo');
        $otro = Request('otro');
        $del = Request('del');
        $al = Request('al');
        $fecha = Carbon::now();
        
        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->motivo = $motivo;
        $tramite_detalles->motivo_otro = $otro;
        $tramite_detalles->fecha_solicitada = $fecha->format('Y-m-j');
        $tramite_detalles->del = $del;
        $tramite_detalles->al = $al;
        $tramite_detalles->save();
        
        # Guardamos los datos a la BD (tabla tramite)
        $tramite = New tramite;
        $tramite->tramite_id = $tramite_detalles->id;
        $tramite->tipo_id = '3';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $id;
        $tramite->save();

        $mes = $fecha->format('m');

        # Creación del PDF
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 'motivo' => $motivo, 'otro' => $otro, 'fecha_solicitada' => $fecha, 'del' => $del, 'al' => $al, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }

    # Creación de pase de salida 
    function paseSalida($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.pase', compact('alumno', 'preJustificantes', 'pre_justificantes'));
    }
    function paseSalidaPDF($id){
        $alumno = Alumno::find($id);
        $motivo = Request('motivo');
        $otro = Request('otro');
        $observaciones = Request('observaciones');
        $fecha = Carbon::now();
        $mes = $fecha->format('m');

        $hora = $fecha->format('H:i');
        $horario = 'AM';

        if($hora > 12){
            $horario = 'PM';
        }else{
            $horario = 'AM';
        }

        if($motivo == 'Otro'){
            $motivo = $otro;
        }

        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->motivo = $motivo;
        $tramite_detalles->motivo_otro = $otro;
        $tramite_detalles->fecha_solicitada = $fecha->format('Y-m-j');
        $tramite_detalles->save();

        $tramite = New tramite;
        $tramite->tramite_id = $tramite_detalles->id;
        $tramite->tipo_id = '2';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $id;
        $tramite->save();

        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.paseSalidaAlumno',   array('alumno' => $alumno, 'motivo' => $motivo, 'otro' => $otro, 'fecha_solicitada' => $fecha, 'mes' => $mes, 'hora' => $hora, 'horario' => $horario, 'observaciones' => $observaciones)); //Carga la vista y la convierte a PDF
        return $pdf->download("paseSalidaAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }

    # Funciones para visualizar las solicitudes e individuales 
    public function solicitudJustificante(){
        //Optienes todos las solicitudes de justificantes
        $pre_justificantes = $this->justificanteDetalles;
        $preJustificantes = $this->justificantesPendientes;

        return view('orientadora.solicitudJustificante', compact('pre_justificantes', 'preJustificantes'));
    }
    public function solicitudJustificanteDetalle($id){
        //Optienes todos las solicitudes de justificantes
        $datosSolicitud = Pre_justificante::find($id);
        $datosAlumno = Alumno::where('id', $datosSolicitud->alumno_id)->first();
        $fecha = Carbon::parse($datosSolicitud->fecha_solicitada);
        $mes = $fecha->month; # Aqui obtenemos el mes que se solicito
        $ano = $fecha->year;
        
        $fecha_solicitada = $datosSolicitud->fecha_solicitada;
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;
        

        return view('orientadora.solicitudJustificanteDetalle', compact('datosSolicitud','datosAlumno', 'mes', 'ano', 'preJustificantes', 'pre_justificantes'));
    }
    # Funciones para afectuar una solicitud
    public function solicitudJustificanteAceptar($nombreAlumno, $idPre){
        $datosPre = Pre_justificante::find($idPre);
        $alumno = Alumno::where('nombre_completo', $nombreAlumno)->first();

        $datosPre->estatus_solicitud = 1;
        $datosPre->save();
        
        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->motivo = $datosPre->motivo;
        $tramite_detalles->motivo_otro = $datosPre->otro;
        $tramite_detalles->fecha_solicitada = $datosPre->fecha_solicitada;
        $tramite_detalles->del = $datosPre->del;
        $tramite_detalles->al = $datosPre->al;
        $tramite_detalles->save();

        # Guardamos los datos a la BD (tabla tramite)
        $tramite = New tramite;
        $tramite->tramite_id = $tramite_detalles->id;
        $tramite->tipo_id = '3';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $alumno->id;
        $tramite->save();

        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.solicitudJustificante', compact('pre_justificantes', 'preJustificantes'));
    }
    public function solicitudJustificanteAceptarDescargar($nombreAlumno, $idPre){
        $datosPre = Pre_justificante::find($idPre);
        $datosAlumno = Alumno::where('nombre_completo', $nombreAlumno)->first();

        $datosPre->estatus_solicitud = 1;
        $datosPre->save();

        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->motivo = $datosPre->motivo;
        $tramite_detalles->motivo_otro = $datosPre->otro;
        $tramite_detalles->fecha_solicitada = $datosPre->fecha_solicitada;
        $tramite_detalles->del = $datosPre->del;
        $tramite_detalles->al = $datosPre->al;
        $tramite_detalles->save();
        
        # Guardamos los datos a la BD (tabla tramite)
        $tramite = New tramite;
        $tramite->tramite_id = $tramite_detalles->id;
        $tramite->tipo_id = '3';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $datosAlumno->id;
        $tramite->save();

        $fecha = Carbon::now();
        $mes = $fecha->format('m');

        # Creación del PDF
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $datosAlumno, 'motivo' => $datosPre->motivo, 'otro' => $datosPre->motivo_otro, 'fecha_solicitada' => $fecha, 'del' => $datosPre->del, 'al' => $datosPre->al, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        
        return $pdf->download("justificanteAlumno".$datosAlumno->nombre.".pdf");
        
    }
    public function solicitudJustificanteDenegar($idPre){
        $datosPre = Pre_justificante::find($idPre);
        
        $datosPre->estatus_solicitud = 2;
        $datosPre->save();

        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

        return view('orientadora.solicitudJustificante', compact('pre_justificantes', 'preJustificantes'));
    }
}
