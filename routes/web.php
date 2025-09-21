<?php

use App\Http\Controllers\WebsisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/inicio', function(){
    return view('websis1');
}); */

Route::controller(WebsisController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('inicio', 'inicio')->name('inicio');
    Route::get('codigos', 'codigos')->name('codigos');
    Route::get('materiasIns', 'materiasIns')->name('materiasIns');
    Route::get('oferta', 'oferta')->name('oferta');
    Route::get('materia', 'materia')->name('materia');
    Route::get('materiaEdit', 'materiaEdit')->name('materiaEdit');
    Route::get('errorpage', 'errorpage')->name('errorpage');
    Route::get('activar', 'activar')->name('activar');
    Route::get('registro', 'registro')->name('registro');
    Route::get('actualizar', 'actualizar')->name('actualizar');
    Route::get('control', 'control')->name('control');
    Route::get('controlHabilitar', 'controlHabilitar')->name('controlHabilitar');
    Route::get('borrarMateria', 'borrarMateria')->name('borrarMateria');
    Route::get('actualizarMaterias', 'actualizarMaterias')->name('actualizarMaterias');
    //Route::get('websis6', 'websis6')->name('websis6');
});
