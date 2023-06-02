<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\tramite;
use App\Models\tramite_detalle;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use PDF;
use Carbon\Carbon;

class TramiteController extends BaseController
{
    # Descargar el QR vista general (sin iniciar sesión)
    function crearQr($idJustificante){
        return QrCode::size(300)->generate('http://164.92.190.198/descargar/qr/'.$idJustificante);
    }

    function QrDescargarJustificante($idJustificante){
        # Obtenemos los datos de la base
        $tramite = tramite::find($idJustificante);
        $alumno = Alumno::find($tramite->alumno_id);
        $tramite_detalle = tramite_detalle::find($tramite->tramite_id);

        $mes = $tramite_detalle->created_at->format('m'); # Obtenemos el mes en el que se solicito
        
        $fecha_solicitada = $tramite_detalle->created_at;
        
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 
                            'motivo' => $tramite_detalle->motivo, 'otro' => $tramite_detalle->motivo_otro, 
                            'fecha_solicitada' => $fecha_solicitada, 
                            'del' => $tramite_detalle->del, 'al' => $tramite_detalle->al, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf");
    }

}

