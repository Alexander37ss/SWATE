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
        $pre_justificantes = Pre_justificante::all();
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
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        
        # Guardamos los datos a la BD (tabla tramite_detalle)
        $tramite_detalles = New tramite_detalle;
        $tramite_detalles->tramite_id = $tramite->id;
        $tramite_detalles->motivo = $motivo;
        $tramite_detalles->motivo_otro = $otro;
        $tramite_detalles->fecha = $fecha->format('Y-m-j');
        $tramite_detalles->del = $del;
        $tramite_detalles->al = $al;
        $tramite_detalles->save();

        # Creación del PDF
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 'otro' => $otro, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'motivo' => $motivo, 'del' => $del, 'al' => $al)); //Carga la vista y la convierte a PDF
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
}
