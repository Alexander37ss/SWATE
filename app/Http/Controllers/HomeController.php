<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\tramite;
use App\Models\Pre_justificante;

class HomeController extends BaseController
{
    /** Funciones para visualización del historial de orientadora */
    public function homeHistorial(){
        $fecha = Carbon::now();
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;


        
        
            $tramites = tramite::where('orientadora_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(12);
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
            return view('orientadora.home', compact('tramites', 'justificantesMes', 'justificantesAno', 'paseSalidaMes', 'paseSalidaAno', 'mes', 'ano', 'preJustificantes', 'pre_justificantes'));
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
            $justificantes = tramite::where('alumno_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
            $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;


            return view('alumno.home', compact('justificantes', 'pre_justificantes'));
        }

        public function homeAlumnoTipo($tipo){
            $justificantes = tramite::where([['alumno_id', auth()->user()->id],['tipo_id', $tipo]])
            ->orderBy('id', 'DESC')
            ->get();
            $preJustificantes = $this->justificantesPendientes;
        $pre_justificantes = $this->justificanteDetalles;

            return view('alumno.home', compact('justificantes', 'preJustificantes', 'pre_justificantes'));
        }
}
