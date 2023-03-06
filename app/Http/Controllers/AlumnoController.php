<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\User;

class AlumnoController extends Controller
{
    public function consultar(){
        //consultas el alumno
        $alumnos = Alumno::all();
        return view('alumno.consultar', compact('alumnos'));
    }

    public function registrar(){
        //registras alumnos
        return view('alumno.registrar');
    }

    function justificanteAlumno($nombrealumno){

        $alumno = User::where('name', $nombrealumno)->first();

        return view('tramites.justificante', compact('alumno'));
    }

    function pre_justificanteAlumno($id){
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