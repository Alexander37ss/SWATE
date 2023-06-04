<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\tramite;
use App\Models\Pre_justificante;
use App\Models\tramite_detalle;
use App\Models\Alumno;

class HomeController extends BaseController
{
    /** Funciones para visualización del historial de orientadora */
    public function homeHistorial(){
        $fecha = Carbon::now();
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;
        $alumno = Alumno::all();

            //info de tramites
            $tramites = tramite::where('orientadora_id', auth()->user()->id)
            ->orderBy('id', 'DESC')->get();

            $justificantesMes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $justificantesAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $paseSalidaMes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereMonth('created_at', '=', $mes)
            ->whereYear('created_at', '=', $ano)
            ->get()->count();
            $paseSalidaAno = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereYear('created_at', '=', $ano)
            ->get()->count();

            //info meses
            $enero = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '01')
            ->get()->count();
            $febrero = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '02')
            ->get()->count();
            $marzo = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '03')
            ->get()->count();
            $abril = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '04')
            ->get()->count();
            $mayo = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '05')
            ->get()->count();
            $junio = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '06')
            ->get()->count();
            $julio = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '07')
            ->get()->count();
            $agosto = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '08')
            ->get()->count();
            $septiembre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '09')
            ->get()->count();
            $octubre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '10')
            ->get()->count();
            $noviembre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '11')
            ->get()->count();
            $diciembre = tramite::where([['orientadora_id', auth()->user()->id]])
            ->whereMonth('created_at', '=', '12')
            ->get()->count();
            /* motivo */
            $motivoVacacional = tramite_detalle::where('motivo', 'Motivo vacacional')
            ->get()->count();
            $motivoSalud = tramite_detalle::where('motivo', 'Motivo de salud')
            ->get()->count();
            $motivoPerdida = tramite_detalle::where('motivo', 'Motivo de perdida')
            ->get()->count();
            $motivoOtro = tramite_detalle::where('motivo', 'Otro...')
            ->get()->count();
            /* grupo */
            $grupoDos = Pre_justificante::where('grupo', 2)->get()->count();
            $grupoCuatro = Pre_justificante::where('grupo', 4)->get()->count();
            $grupoSeis = Pre_justificante::where('grupo', 6)->get()->count();

            return view('orientadora.home', compact('alumno','grupoDos', 'grupoCuatro', 'grupoSeis', 'motivoVacacional', 'motivoSalud', 'motivoPerdida', 'motivoOtro','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre', 'tramites', 'justificantesMes', 'justificantesAno', 'paseSalidaMes', 'paseSalidaAno', 'mes', 'ano', 'preJustificantes', 'pre_justificantes'));
        }
        
        public function homeHistorialTipo($tipo){
            $fecha = Carbon::now();
            $mes = $fecha->format('m');
            $ano = $fecha->format('Y');
            $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

            
            $tramites = tramite::where([['orientadora_id', auth()->user()->id], ['tipo_id', $tipo]])
            ->orderBy('id', 'DESC')
            ->get();
            $justificantes = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 3]])
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->get();
            $paseSalida = tramite::where([['orientadora_id', auth()->user()->id],['tipo_id', 2]])
            ->whereMonth('created_at', $mes)
            ->whereYear('created_at', $ano)
            ->get();
    
            return view('orientadora.home', compact('tramites', 'justificantes', 'paseSalida', 'mes', 'ano', 'preJustificantes', 'pre_justificantes'));
        }  

        /** Funciones para visualización del historial del alumno */ 
        public function homeAlumno(){
            $nuevosJustificantes = tramite::where('alumno_id', auth()->user()->id)
            ->orderBy('id', 'DESC')->take(3) //toma 3 registros
            ->get();
            $justificantes = tramite::where('alumno_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
            $numJustificantes = tramite::where('alumno_id', auth()->user()->id)
            ->get()
            ->count();
            $fecha = tramite::where([['alumno_id', auth()->user()->id], ['autorizado', 1]])->orderBy('id', 'DESC')->pluck('created_at');
            $mes = [];
            for($i = 0; $i < count($fecha); $i++){
                $mes[$i] = $fecha[$i]->format('m');
             }

            
            return view('alumno.home', compact('justificantes', 'nuevosJustificantes', 'numJustificantes', 'mes'));
        }

        public function homeAlumnoTipo($tipo){
            $justificantes = tramite::where([['alumno_id', auth()->user()->id],['tipo_id', $tipo]])
            ->orderBy('id', 'DESC')
            ->get();

            return view('alumno.home', compact('justificantes',));
        }
}
