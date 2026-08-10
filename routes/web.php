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
    Route::get('logout', 'logout')->name('logout');
    Route::get('cambiarTiempo', 'cambiarTiempo')->name('cambiarTiempo');
    Route::get('logoutServe', 'logoutServe')->name('logoutServe');
    Route::get('salirInscripcion', 'salirInscripcion')->name('salirInscripcion');
    Route::get('loginInscripcion', 'loginInscripcion')->name('loginInscripcion');
    Route::get('inicio', 'inicio')->name('inicio');
    Route::get('codigos', 'codigos')->name('codigos');
    Route::get('materiasIns', 'materiasIns')->name('materiasIns');
    Route::get('oferta', 'oferta')->name('oferta');
    Route::post('materia', 'materia')->name('materia');
    Route::get('materiaEdit', 'materiaEdit')->name('materiaEdit');
    Route::get('errorpage', 'errorpage')->name('errorpage');
    Route::get('activar', 'activar')->name('activar');
    Route::get('sesion', 'sesion')->name('sesion');
    Route::get('registro', 'registro')->name('registro');
    Route::get('actualizar', 'actualizar')->name('actualizar');
    Route::get('control', 'control')->name('control');
    Route::get('controlHabilitar', 'controlHabilitar')->name('controlHabilitar');
    Route::get('borrarMateria', 'borrarMateria')->name('borrarMateria');
    Route::get('actualizarMaterias', 'actualizarMaterias')->name('actualizarMaterias');
    Route::get('actualizarMateriasEditar', 'actualizarMateriasEditar')->name('actualizarMateriasEditar');
    Route::get('borrarMaterias', 'borrarMaterias')->name('borrarMaterias');
    //Route::get('websis6', 'websis6')->name('websis6');
});
