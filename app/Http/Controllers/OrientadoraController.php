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
