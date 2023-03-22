<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrientadoraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['admin', 'role:admin']], function(){

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /******************************************************************************/
    
    # Capacidad de visualizar las deciciones de orientadoras a peticiones justificantes 
    Route::get('home', [HomeController::class, 'homeHistorial']);    
    Route::get('tramites/historialJustificante/{tipo}', [HomeController::class, 'homeHistorialTipo']);

    Route::get('tramites/consultar', [OrientadoraController::class, 'consultar']);  
    Route::get('tramites/consultar/especialidad/{especialidad}', [OrientadoraController::class, 'consultarEspecialidad']);  
    Route::get('tramites/consultar/grupo/{grupo}', [OrientadoraController::class, 'consultarGrupo']);  
    Route::get('tramites/consultar/sexo/{sexo}', [OrientadoraController::class, 'consultarSexo']);  
    
    /* Justificante de parte de orientacion */
    Route::get('tramites/justificanteOrientadora/{nombrealumno}', [OrientadoraController::class, 'justificanteOrientadora']);
    Route::post('tramites/procesoJustificante/{id}', [OrientadoraController::class, 'justificanteOrientadoraPDF']);    
    
    Route::get('tramites/solicitudJustificante', [OrientadoraController::class, 'solicitudJustificante']);
    Route::get('tramites/solicitudJustificante/{id}', [OrientadoraController::class, 'solicitudJustificanteDetalle']);

    # Desiciones de la orientadora a peticiones de justificantes
    Route::get('tramites/solicitudAceptarJustificante/{nombreAlumno}/{idPre}', [OrientadoraController::class, 'solicitudJustificanteAceptar']);
    Route::get('tramites/solicitudDescargarJustificante/{nombreAlumno}/{idPre}', [OrientadoraController::class, 'solicitudJustificanteAceptarDescargar']);
    Route::get('tramites/solicitudDenegarJustificante/{idPre}', [OrientadoraController::class, 'solicitudJustificanteDenegar']);
    
    /* Pase de salida de parte de orientacion */
    Route::get('tramites/pase_salida/{nombrealumno}', [OrientadoraController::class, 'paseSalida']);    
    Route::post('tramites/procesoPaseSalida/{id}', [OrientadoraController::class, 'paseSalidaPDF']);    
        
    /* Constancia de estudio para ambas partes*/
    Route::get('constancia/pdf/{nombreusuario}', [TramiteController::class, 'ConstanciaAlumnoPDF']);    
});

Route::group(['prefix' => 'alumno', 'middleware' => ['alumno', 'role:alumno']], function(){
    /*visitar el home del alumno*/
    Route::get('/home', [HomeController::class, 'homeAlumno']);
    Route::get('/home/{tipo}', [HomeController::class, 'homeAlumnoTipo']);

    /* Justificante de parte del alumno */
    Route::get('/justificante/{nombreAlumno}', [AlumnoController::class, 'justificante']);
    
    /* pre-justificante de parte del alumno */
    Route::post('/prejustificante/{nombreAlumno}', [AlumnoController::class, 'pre_justificanteAlumno']);
    
    /* crear constancia del alumno */
    Route::get('/constancia/pdf/{nombreusuario}', [TramiteController::class, 'ConstanciaAlumnoPDF']);    
});

require __DIR__.'/auth.php';
