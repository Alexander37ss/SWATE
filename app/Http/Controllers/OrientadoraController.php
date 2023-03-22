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
    # Funciones para visualizar la vista consultar y sus filtros
    public function consultar(){
        //consultas el alumno
        $alumnos = Alumno::all();
        return view('orientadora.consultar', compact('alumnos'));
    }

    function consultarEspecialidad($especialidad){
        $alumnos = Alumno::where('carrera', $especialidad)->get();
        return view('orientadora.consultar', compact('alumnos'));
    }
    function consultarSexo($sexo){
        $alumnos = Alumno::where('sexo', $sexo)->get();
        return view('orientadora.consultar', compact('alumnos'));
    }
    function consultarGrupo($grupo){
        $alumnos = Alumno::where('grupo', 'LIKE', '%'.$grupo.'%')->get();
        return view('orientadora.consultar', compact('alumnos'));
    }

    # Creación de justificante 
    function justificanteOrientadora($nombrealumno){
        $alumno = Alumno::where('nombre_completo', $nombrealumno)->first();
        return view('orientadora.justificanteOrientadora', compact('alumno'));
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
        return view('orientadora.pase', compact('alumno'));
    }
    function paseSalidaPDF($id){
        $alumno = Alumno::find($id);
        $motivo = Request('motivo');
        $otro = Request('otro');
        $fecha = Carbon::now();
        $mes = $fecha->format('m');

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
        $pdf = PDF::loadView('PDF.paseSalidaAlumno',   array('alumno' => $alumno, 'motivo' => $motivo, 'otro' => $otro, 'fecha_solicitada' => $fecha, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        return $pdf->download("paseSalidaAlumno".$alumno->nombre.".pdf"); //Descarga el PDF con ese nombre
    }

    # Funciones para visualizar las solicitudes e individuales 
    public function solicitudJustificante(){
        //Optienes todos las solicitudes de justificantes
        $pre_justificantes = Pre_justificante::where('estatus_solicitud', 0)->get();
        return view('orientadora.solicitudJustificante', compact('pre_justificantes'));
    }
    public function solicitudJustificanteDetalle($id){
        //Optienes todos las solicitudes de justificantes
        $datosSolicitud = Pre_justificante::find($id);
        $datosAlumno = Alumno::where('id', $datosSolicitud->alumno_id)->first();
        
        $fecha = Carbon::parse($datosSolicitud->fecha_solicitada);
        $mes = $fecha->month; # Aqui obtenemos el mes que se solicito
        $ano = $fecha->year;

        $fecha_solicitada = $datosSolicitud->fecha_solicitada;
        return view('orientadora.solicitudJustificanteDetalle', compact('datosSolicitud','datosAlumno', 'mes', 'ano' ));
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

        $pre_justificantes = Pre_justificante::where('estatus_solicitud', '=' , 0)->get();
        return view('orientadora.solicitudJustificante', compact('pre_justificantes'));
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
        
        $pdf->download("justificanteAlumno".$datosAlumno->nombre.".pdf");
        
        return redirect('tramites/solicitudJustificante');
    }
    public function solicitudJustificanteDenegar($idPre){
        $datosPre = Pre_justificante::find($idPre);
        
        $datosPre->estatus_solicitud = 2;
        $datosPre->save();
        
        $pre_justificantes = Pre_justificante::where('estatus_solicitud', '=' , 0)->get();
        return view('orientadora.solicitudJustificante', compact('pre_justificantes'));
    }
}
