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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('tramites/justificante', [TramiteController::class, 'justificante']);
    Route::get('tramites/constancia', [TramiteController::class, 'constancia']);
    Route::get('tramites/procesandojustificante', [TramiteController::class, 'JustificantePOST']);
    
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('alumno/consultar', [AlumnoController::class, 'consultar']);    

    Route::get('constancia/pdf/{nombreusuario}', [TramiteController::class, 'ConstanciaAlumnoPDF']);    
    
    Route::get('alumno/registrar', function () {
        return view('alumno.registrar');
    });
});

require __DIR__.'/auth.php';
