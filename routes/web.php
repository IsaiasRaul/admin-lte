<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\MunicipalidadesController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('registrar', [UserController::class, 'registrar'])->name('users.registrar');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('form', [FormulariosController::class, 'index'])->name('form');
    Route::get('formRespuesta/{idregistro}/{idconvocatoria}', [FormulariosController::class, 'formulario_respuesta'])->name('form.respuesta');
    Route::post('/guardar_postulacion', [FormulariosController::class, 'store'])->name('guardarPostulacion');

    Route::get('municipalidades', [MunicipalidadesController::class, 'index'])->name('muni.municipalidades');
});
