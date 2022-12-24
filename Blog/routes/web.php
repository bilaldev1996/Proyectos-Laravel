<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', HomeController::class)->name('home');
/* Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index')->name('cursos.index');
    Route::get('cursos/create', 'create')->name('cursos.create');
    Route::post('cursos', 'store')->name('cursos.store');
    Route::get('cursos/{curso}', 'show')->name('cursos.show');
    Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
    Route::put('cursos/{curso}', 'update')->name('cursos.update');
    Route::delete('cursos/{curso}', 'destroy')->name('cursos.destroy');
}); */

/* optimizar codigo anterior */
Route::resource('cursos', CursoController::class);

Route::view('nosotros', 'nosotros')->name('nosotros'); // ruta para la vista nosotros sin controlador ni modelo asociado a ella

Route::get('contactanos',[ ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos',[ ContactanosController::class, 'store'])->name('contactanos.store');

// si queremos cambiar el nombre de la ruta por defecto
/* Route::resource('asignaturas', CursoController::class) // cambiar el nombre de la ruta por defecto
->parameters(['asignaturas' => 'curso']) // cambiar el nombre de la variable en la ruta por defecto
->names('cursos');  // mantener el nombre de la ruta para utilizar los métodos creados en el controlador */