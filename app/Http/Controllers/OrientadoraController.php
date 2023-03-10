<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Pre_justificante;
use App\Models\tramite_detalle;
use App\Models\tramite;


class OrientadoraController extends Controller
{
    public function consultar(){
        //consultas el alumno
        $alumnos = Alumno::all();
        return view('orientadora.consultar', compact('alumnos'));
    }

    function justificanteOrientadora($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        return view('orientadora.justificanteOrientadora', compact('alumno'));
    }

    public function solicitudJustificante(){
        //Optienes todos las solicitudes de justificantes
        $pre_justificantes = Pre_justificante::where('estatus_solicitud', 0)->get();
        return view('orientadora.solicitudJustificante', compact('pre_justificantes'));
    }

    public function solicitudJustificanteDetalle($id){
        //Optienes todos las solicitudes de justificantes
        $datosSolicitud = Pre_justificante::find($id);
        $datosAlumno = Alumno::where('nombre_completo', $datosSolicitud->nombre_solicitante)->first();

        return view('orientadora.solicitudJustificanteDetalle', compact('datosSolicitud','datosAlumno'));
    }

    function justificanteOrientadoraPDF($id){
        # Guardamos los datos a la BD (tabla tramite)
        $tramite = New tramite;
        $tramite->tipo_id = '3';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $id;
        $tramite->save();
        
        # Guardamos los datos del formulario a request
        $alumno = Alumno::find($id);
        $motivo = Request('motivo');
        $otro = Request('otro');
        $del = Request('del');
        $al = Request('al');
        $fecha = Carbon::now();
        
        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->tramite_id = $tramite->id;
        $tramite_detalles->motivo = $motivo;
        $tramite_detalles->motivo_otro = $otro;
        $tramite_detalles->fecha_solicitada = $fecha->format('Y-m-j');
        $tramite_detalles->del = $del;
        $tramite_detalles->al = $al;
        $tramite_detalles->save();

        $mes = $fecha->format('m');

        # Creación del PDF
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 'motivo' => $motivo, 'otro' => $otro, 'fecha_solicitada' => $fecha, 'del' => $del, 'al' => $al, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
    
    function paseSalida($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        return view('orientadora.pase', compact('alumno'));
    }
    
    function paseSalidaPDF($id){
        $alumno = Alumno::find($id);
        $motivo = Request('motivo');
        $otro = Request('otro');
        
        $fecha = Carbon::now();
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.paseSalidaAlumno', array('alumno' => $alumno, 'otro' => $otro, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'motivo' => $motivo, )); //Carga la vista y la convierte a PDF
        return $pdf->download("paseSalidaAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }

    public function solicitudJustificanteAceptar($nombreAlumno, $idPre){
        $datosPre = Pre_justificante::find($idPre);
        $alumno = Alumno::where('nombre_completo', $nombreAlumno)->first();

        $datosPre->estatus_solicitud = 1;
        $datosPre->save();
        
        # Guardamos los datos a la BD (tabla tramite)
        $tramite = New tramite;
        $tramite->tipo_id = '3';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $alumno->id;
        $tramite->save();

        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->tramite_id = $tramite->id;
        $tramite_detalles->motivo = $datosPre->motivo;
        $tramite_detalles->motivo_otro = $datosPre->otro;
        $tramite_detalles->fecha_solicitada = $datosPre->fecha_solicitada;
        $tramite_detalles->del = $datosPre->del;
        $tramite_detalles->al = $datosPre->al;
        $tramite_detalles->save();

        $pre_justificantes = Pre_justificante::where('estatus_solicitud', '=' , 0)->get();
        return view('orientadora.solicitudJustificante', compact('pre_justificantes'));
    }

    public function solicitudJustificanteAceptarDescargar($nombreAlumno, $idPre){
        $datosPre = Pre_justificante::find($idPre);
        $datosAlumno = Alumno::where('nombre_completo', $nombreAlumno)->first();
        $alumno = Alumno::where('nombre_completo', $nombreAlumno)->first();

        $datosPre->estatus_solicitud = 1;
        $datosPre->save();
        
        # Guardamos los datos a la BD (tabla tramite)
        $tramite = New tramite;
        $tramite->tipo_id = '3';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $alumno->id;
        $tramite->save();

        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->tramite_id = $tramite->id;
        $tramite_detalles->motivo = $datosPre->motivo;
        $tramite_detalles->motivo_otro = $datosPre->otro;
        $tramite_detalles->fecha_solicitada = $datosPre->fecha_solicitada;
        $tramite_detalles->del = $datosPre->del;
        $tramite_detalles->al = $datosPre->al;
        $tramite_detalles->save();

        $fecha = Carbon::now();
        $mes = $fecha->format('m');

        # Creación del PDF
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $datosAlumno, 'motivo' => $datosPre->motivo, 'otro' => $datosPre->motivo_otro, 'fecha_solicitada' => $fecha, 'del' => $datosPre->del, 'al' => $datosPre->al, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}
