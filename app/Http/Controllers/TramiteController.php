<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\tramite;

use PDF;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TramiteController extends Controller
{
    # Descargar el QR vista general (sin iniciar sesión)
    function crearQr($idJustificante){
        return QrCode::size()->generate('descargar/qr/'.$idJustificante);
    }

    function QrDescargarJustificante($idJustificante){


        
        PDF::SetPaper('A4', 'landscape'); //Configuracion de la libreria
        $pdf = PDF::loadView('PDF.JustificanteAlumno', array('alumno' => $alumno, 'motivo' => $motivo, 'otro' => $otro, 'fecha_solicitada' => $fecha, 'del' => $del, 'al' => $al, 'mes' => $mes)); //Carga la vista y la convierte a PDF
        return $pdf->download("justificanteAlumno".$alumno->nombre.".pdf");
    }

}

