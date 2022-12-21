<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\CursoController;
use App\Http\Controllers\NoteController;

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

Route::get('/', HomeController::class);

Route::controller(NoteController::class)->group(function(){
    Route::get('notes', 'index')->name('notes.index');
    Route::get('notes/create', 'create')->name('notes.create');
    Route::post('notes', 'store')->name('notes.store');
    Route::get('notes/{id}', 'show')->name('notes.show');
    Route::get('notes/{id}/edit', 'edit')->name('notes.edit');
    Route::put('notes/{id}', 'update')->name('notes.update');
    Route::get('notes/{id}/confirmDelete', 'confirmDelete')->name('notes.confirmDelete');
    Route::delete('notes/{id}/delete', 'delete')->name('notes.delete');
});
