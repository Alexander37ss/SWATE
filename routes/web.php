<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrientadoraController;

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
    
    # Capacidad de visualizar las decisiones de orientadoras a peticiones justificantes 
    Route::get('home', [HomeController::class, 'homeHistorial']);    
    Route::get('tramites/historialJustificante/{tipo}', [HomeController::class, 'homeHistorialTipo']);

    Route::post('tramites/consultar/busqueda', [OrientadoraController::class, 'consultarBusquedaAvanzado']);  
    Route::get('tramites/consultar', [OrientadoraController::class, 'consultar']);  
    Route::get('tramites/consultar/{nombre}', [OrientadoraController::class, 'consultarBusqueda']);  
    
    /* Justificante de parte de orientacion */
    Route::get('tramites/justificanteOrientadora/{nombrealumno}', [OrientadoraController::class, 'justificanteOrientadora']);
    Route::post('tramites/procesoJustificante/{id}', [OrientadoraController::class, 'justificanteOrientadoraPDF']);    
    
    Route::get('tramites/solicitudJustificante', [OrientadoraController::class, 'solicitudJustificante']);
    Route::get('tramites/solicitudJustificante/{id}', [OrientadoraController::class, 'solicitudJustificanteDetalle']);

    # Decisiones de la orientadora a peticiones de justificantes
    Route::get('tramites/solicitudAceptarJustificante/{nombreAlumno}/{idPre}', [OrientadoraController::class, 'solicitudJustificanteAceptar']);
    Route::get('tramites/solicitudDescargarJustificante/{nombreAlumno}/{idPre}', [OrientadoraController::class, 'solicitudJustificanteAceptarDescargar']);
    Route::get('tramites/solicitudDenegarJustificante/{nombreAlumno}/{idPre}', [OrientadoraController::class, 'solicitudJustificanteDenegar']);
    
    /* Pase de salida de parte de orientacion */
    Route::get('tramites/pase_salida/{nombrealumno}', [OrientadoraController::class, 'paseSalida']);    
    Route::post('tramites/procesoPaseSalida/{id}', [OrientadoraController::class, 'paseSalidaPDF']);    
        
    /* Constancia de estudio para ambas partes*/
    Route::get('constancia/pdf/{nombreusuario}', [AlumnoController::class, 'ConstanciaAlumnoPDF']);   
    
    /* Detalles de tramites ya aceptados */
    Route::get('/tramite_detalle/{id}', [OrientadoraController::class, 'tramiteDetalle']);

    /* Perfil de alumno */
    Route::get('/perfil/{nombre_alumno}', [OrientadoraController::class, 'perfilAlumno']);

    /* Otros */
    Route::get('/graficas', [OrientadoraController::class, 'grafica']);
    Route::get('/historial', [OrientadoraController::class, 'historial']);
    Route::get('/historial/aceptados', [OrientadoraController::class, 'historialAceptado']);
    Route::get('/historial/rechazados', [OrientadoraController::class, 'historialRechazado']);
});

Route::get('crear/qr/{idJustificante}', [TramiteController::class, 'crearQr']);
Route::get('descargar/qr/{idJustificante}', [TramiteController::class, 'QrDescargarJustificante']);

Route::group(['prefix' => 'alumno', 'middleware' => ['alumno', 'role:alumno']], function(){
    /*visitar el home del alumno*/
    Route::get('/home', [HomeController::class, 'homeAlumno']);
    Route::get('/home/{tipo}', [HomeController::class, 'homeAlumnoTipo']);

    /* Justificante de parte del alumno */
    Route::get('/justificante', [AlumnoController::class, 'justificante']);
    
    Route::get('/misSolicitudes', [AlumnoController::class, 'solicitudes']);

    Route::get('/misSolicitudes/cancelar/{id}', [AlumnoController::class, 'solicitudCancelar']);
    Route::get('/misSolicitudes/editar/{id}', [AlumnoController::class, 'solicitudEditar']);
    Route::post('/misSolicitudes/editar/{nombreAlumno}/{id}', [AlumnoController::class, 'editarConfirmado']);

    /* pre-justificante de parte del alumno */
    Route::post('/prejustificante/{nombrealumno}', [AlumnoController::class, 'pre_justificanteAlumno']);
    
    /* crear constancia del alumno */
    Route::get('/constancia/pdf/{nombreusuario}', [AlumnoController::class, 'ConstanciaAlumnoPDF']);    
});

require __DIR__.'/auth.php';
