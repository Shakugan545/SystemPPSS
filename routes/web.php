<?php

use App\Http\Controllers\EstudianteController;
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
    return view('inicio');
});

Route::resource('estudiantes', 'EstudianteController');
Route::resource('expedientes', 'ExpedientesController');
Route::get('expedientes/{id}/download', 'ExpedientesController@download')->name('expe.download');
Route::get('estudiantes/ver', 'EstudianteController@todo')->name('ver.info');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
