<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Pre_justificante;
use App\Models\User;

class AlumnoController extends Controller
{
    # Nos lleva a la vista tramites.justificantes
    function justificante($nombreAlumno){
        return view('alumno.justificante');
    }

    # Esto se ejecuta cuando el alumno lleno el formulario para solicitar justificante
    function pre_justificanteAlumno(Request $request, $nombreAlumno){
        # Inserción de datos a la tabla pre_justificantes
        $datosAlumno = Alumno::where('nombre_completo', $nombreAlumno)->first();
        $Pre_justificante = new Pre_justificante;

        $Pre_justificante->alumno_id = $datosAlumno->id;

        $Pre_justificante->motivo = $request->input('motivo');
        $Pre_justificante->motivo_otro = $request->input('motivo_otro');

        $Pre_justificante->del = $request->input('del');
        $Pre_justificante->al = $request->input('al');

        $fecha = Carbon::now();
        $Pre_justificante->fecha_solicitada = $fecha->format('Y-m-j');

        $Pre_justificante->estatus_solicitud = 0;

        $Pre_justificante->save();

        session()->flash('status', 'Solicitud enviada!');

        return view('alumno.justificante');
    }
    
    # Descargar constancia estudio, vista alumno
    function ConstanciaAlumnoPDF($nombreusuario){
        $alumno = Alumno::where('nombre_completo', $nombreusuario)->first(); //DAtos de la base de datos
        $fecha = Carbon::now();
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.ConstanciaAlumno', array('alumno' => $alumno, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano)); //Carga la vista y la convierte a PDF
        return $pdf->download("constanciaAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}