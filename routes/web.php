<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\AlumnoController;
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
    Route::get('tramites/justificante', [TramiteController::class, 'justificante']);
    Route::get('tramites/justificanteOrientadora/{nombrealumno}', [TramiteController::class, 'justificanteOrientadora']);
    Route::get('tramites/pase_salida/{nombrealumno}', [TramiteController::class, 'paseSalida']);    
    Route::post('tramites/procesoJustificante/{id}', [TramiteController::class, 'justificanteOrientadoraPDF']);    
    
    Route::get('home', function () {
        return view('home');
    });
    Route::get('alumno/consultar', [AlumnoController::class, 'consultar']);    

    Route::get('constancia/pdf/{nombreusuario}', [TramiteController::class, 'ConstanciaAlumnoPDF']);    
    
});

Route::group(['prefix' => 'alumno', 'middleware' => ['alumno', 'role:alumno']], function(){
    Route::get('alumno/home', function () {
        return view('home');
    });
});

require __DIR__.'/auth.php';
