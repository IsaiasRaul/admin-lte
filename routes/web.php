<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\MunicipalidadesController;
use App\Http\Controllers\DetallePersonasDiscapacidadController;
use App\Http\Livewire\Select2;


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
    //return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('registrar', [UserController::class, 'registrar'])->name('users.registrar');
    Route::post('userstore', [UserController::class, 'store'])->name('users.store');
    Route::get('userview', [UserController::class, 'show'])->name('users.show');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('form', [FormulariosController::class, 'index'])->name('form');
    Route::get('formRespuesta/{idregistro}/{idconvocatoria}', [FormulariosController::class, 'formulario_respuesta'])->name('form.respuesta');
    Route::post('/guardar_postulacion', [FormulariosController::class, 'store'])->name('guardarPostulacion');
    
    Route::get('municipalidades', [MunicipalidadesController::class, 'index'])->name('muni.municipalidades');

    Route::post('/guardar_persona_discapacidad', [DetallePersonasDiscapacidadController::class, 'create'])->name('guardarpersonadiscapacidad');
    Route::post('/obtener_persona_discapacidad', [DetallePersonasDiscapacidadController::class, 'show'])->name('obtenerpersonadiscapacidad');
    Route::post('/delete_persona_discapacidad', [DetallePersonasDiscapacidadController::class, 'update'])->name('deletepersonadiscapacidad');
    Route::post('/view_persona_discapacidad', [DetallePersonasDiscapacidadController::class, 'view_persona'])->name('viewpersonadiscapacidad');
    Route::post('/actualizar_persona_discapacidad', [DetallePersonasDiscapacidadController::class, 'edit'])->name('actualizarpersonadiscapacidad');
    Route::post('/ver_persona_discapacidad', [DetallePersonasDiscapacidadController::class, 'show'])->name('verpersonadiscapacidad');
        
    Route::post('/finaliza_formulario', [FormulariosController::class, 'formulario_finaliza'])->name('municipio.finaliza');
    
    Route::post('/actualiza_estado', [FormulariosController::class, 'actualiza_estado'])->name('actualizaestado');

    /**admin */    
    Route::get('revision', [FormulariosController::class, 'revision'])->name('admin.revision');
    Route::get('formrevision/{idregistro}/{idconvocatoria}', [FormulariosController::class, 'formrevision'])->name('admin.formrevision');
    
});
