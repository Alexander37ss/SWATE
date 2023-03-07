<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Pre_justificante;


class OrientadoraController extends Controller
{
    function justificanteOrientadora($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        return view('tramites.justificanteOrientadora', compact('alumno'));
    }

    public function solicitudJustificante(){
        //Optienes todos las solicitudes de justificantes
        $pre_justificantes = Pre_justificante::all();
        return view('tramites.solicitudJustificante', compact('pre_justificantes'));
    }

    public function solicitudJustificanteDetalle($id){
        //Optienes todos las solicitudes de justificantes
        $datosSolicitud = Pre_justificante::find($id);
        $datosAlumno = Alumno::where('nombre_completo', $datosSolicitud->nombre_solicitante)->first();

        return view('tramites.solicitudJustificanteDetalle', compact('datosSolicitud','datosAlumno'));
    }

    function justificanteOrientadoraPDF($id){
        $alumno = Alumno::find($id);
        $motivo = Request('motivo');
        $del = Request('del');
        $al = Request('al');
        $otro = Request('otro');
        $fecha = Carbon::now();
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 'otro' => $otro, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano, 'motivo' => $motivo, 'del' => $del, 'al' => $al)); //Carga la vista y la convierte a PDF
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}
