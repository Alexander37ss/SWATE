<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\AlumnoController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /********************************/
    Route::get('home', function () {
        return view('home');
    });

    Route::get('alumno/consultar', [AlumnoController::class, 'consultar']);    
    
    /* Justificante de parte de orientacion */
    Route::get('tramites/justificanteOrientadora/{nombrealumno}', [OrientadoraController::class, 'justificanteOrientadora']);
    Route::post('tramites/procesoJustificante/{id}', [OrientadoraController::class, 'justificanteOrientadoraPDF']);    
    
    /* Pase de salida de parte de orientacion */
    Route::get('tramites/pase_salida/{nombrealumno}', [TramiteController::class, 'paseSalida']);    
        
    /* Justificante de parte del alumno */
    Route::get('tramites/justificanteAlumno/{nombreAlumno}', [AlumnoController::class, 'justificanteAlumno']);
    Route::post('tramites/prejustificanteAlumno/{id}', [AlumnoController::class, 'pre_justificanteAlumno']);

    /* Constancia de estudio para ambas partes*/
    Route::get('constancia/pdf/{nombreusuario}', [TramiteController::class, 'ConstanciaAlumnoPDF']);    
});

require __DIR__.'/auth.php';
