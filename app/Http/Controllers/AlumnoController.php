<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\tramite;
use App\Models\Pre_justificante;
use App\Models\User;

class AlumnoController extends Controller
{
    # Nos lleva a la vista tramites.justificantes
    function justificante(){
        return view('alumno.justificante');
    }

    function solicitudCancelar($id){
        $preJustificante = Pre_justificante::where('id', $id);
        $preJustificante->delete();
        return redirect('alumno/misSolicitudes');
    }

    function solicitudEditar($id){
        $preJustificante = Pre_justificante::where('id', $id);
        return view('alumno.justificante', compact('preJustificante'));
    }
    function solicitudes(){
        $datosAlumno = Alumno::where('nombre_completo', auth()->user()->name)->first();
        $preJustificante = Pre_justificante::where([['alumno_id', $datosAlumno->id], ['estatus_solicitud', 0]])->orderBy('id', 'DESC')->get();
        $fecha = Pre_justificante::where([['alumno_id', $datosAlumno->id], ['estatus_solicitud', 0]])->orderBy('id', 'DESC')->pluck('created_at');
        $mes = [];
        for($i = 0; $i < count($fecha); $i++){
            $mes[$i] = $fecha[$i]->format('m');
        }
        if(isset($preJustificante) && count($preJustificante) <= 0){
            Session::flash('no_solicitud', 'Mensaje de prueba');
        }
        return view('alumno.solicitudes', compact('preJustificante', 'datosAlumno', 'mes'));
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
        
        $Pre_justificante->grupo = $datosAlumno->grupo;

        $Pre_justificante->save();

        session()->flash('status', 'Tu solicitud de justificante ha sido enviada exitosamente!, se te notificará cuando sea aceptada.');
        
        
        $justificantes = tramite::where('alumno_id', auth()->user()->id)
        ->orderBy('id', 'DESC')
        ->get();
        $preJustificantes = Pre_justificante::where('estatus_solicitud', 0)
        ->get();
        $preJustificantes = $preJustificantes->count();
        
        $numJustificantes = tramite::where('alumno_id', auth()->user()->id)
        ->get()
        ->count();
        
        return redirect('alumno/home');
    }
    
    # Descargar constancia estudio, vista alumno
    function ConstanciaAlumnoPDF($nombreusuario){
        $alumno = Alumno::where('nombre_completo', $nombreusuario)->first(); //DAtos de la base de datos
        $fecha = Carbon::now();
        $dia = $fecha->format('j');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.ConstanciaAlumno', array('alumno' => $alumno, 'fecha' => $fecha, 'dia' => $dia, 'mes' => $mes, 'ano' => $ano, )); //Carga la vista y la convierte a PDF
        return $pdf->download("constanciaAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }
}