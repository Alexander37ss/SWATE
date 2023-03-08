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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::group(['middleware' => ['admin', 'role:admin']], function(){

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /******************************************************************************/
    Route::get('home', [HomeController::class, 'home']);    


    Route::get('alumno/consultar', [AlumnoController::class, 'consultar']);    
    
    /* Justificante de parte de orientacion */
    Route::get('tramites/justificanteOrientadora/{nombrealumno}', [OrientadoraController::class, 'justificanteOrientadora']);
    Route::post('tramites/procesoJustificante/{id}', [OrientadoraController::class, 'justificanteOrientadoraPDF']);    
    
    Route::get('tramites/solicitudJustificante', [OrientadoraController::class, 'solicitudJustificante']);
    Route::get('tramites/solicitudJustificante/{id}', [OrientadoraController::class, 'solicitudJustificanteDetalle']);
    
    /* Pase de salida de parte de orientacion */
    Route::get('tramites/pase_salida/{nombrealumno}', [TramiteController::class, 'paseSalida']);    
        
    /* Justificante de parte del alumno */
    Route::get('tramites/justificanteAlumno/{nombreAlumno}', [AlumnoController::class, 'justificanteAlumno']);
                        # el :name hace que en vez de buscar el id, busque el name
    Route::post('tramites/prejustificanteAlumno/{nombreAlumno}', [AlumnoController::class, 'pre_justificanteAlumno']);

    /* Constancia de estudio para ambas partes*/
    Route::get('constancia/pdf/{nombreusuario}', [TramiteController::class, 'ConstanciaAlumnoPDF']);    
});

Route::group(['prefix' => 'alumno', 'middleware' => ['alumno', 'role:alumno']], function(){
    Route::get('/home', function () {
        return view('alumno.home');
    });
});

require __DIR__.'/auth.php';
