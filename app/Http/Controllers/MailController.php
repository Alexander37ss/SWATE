<?php

namespace App\Http\Controllers;

use PDF;
use Session;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\tramite_detalle;
use App\Models\tramite;

class MailController extends Controller
{
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
        $tramite->autorizado = '0';
        $tramite->orientadora_id = auth()->user()->id;
        $tramite->alumno_id = $id;
        $tramite->save();

        $mailData = [
            'title' => 'Solicitud De Pase de Salida de '.$alumno->nombre_completo,
            'body' => 'This is for testing email using smtp.',
            'alumno' => $alumno,
            'motivo' => $motivo,
            'otro' => $otro,
            'fecha_solicitada' => $fecha,
            'mes' => $mes,
            'hora' => $hora,
            'horario' => $horario, 'observaciones' => $observaciones
        ];
         
        Mail::to('your_email@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
