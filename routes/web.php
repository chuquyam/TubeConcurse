<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinaController;


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

//slider
Route::get('home-slider','App\Http\Controllers\Admin\SliderController@index');
Route::get('add-slider','App\Http\Controllers\Admin\SliderController@create');
Route::post('store-slider','App\Http\Controllers\Admin\SliderController@store');
Route::get('edit-slider/{id}','App\Http\Controllers\Admin\SliderController@edit');
Route::put('update-slider/{id}','App\Http\Controllers\Admin\SliderController@update');

//cadastro concurso

Route::get('home-concurso','App\Http\Controllers\ConcursoController@index');
Route::get('add-concurso','App\Http\Controllers\ConcursoController@create');
Route::post('store-concurso','App\Http\Controllers\ConcursoController@store');
Route::get('edit-concurso/{id}','App\Http\Controllers\ConcursoControllerr@edit');
Route::put('update-concurso/{id}','App\Http\Controllers\ConcursoControllerr@update');

//cadastro disciplina

Route::get('home-disciplina','App\Http\Controllers\DisciplinaController@index');
Route::get('add-disciplina','App\Http\Controllers\DisciplinaController@create');
Route::post('store-disciplina','App\Http\Controllers\DisciplinaController@store');
Route::get('edit-disciplina/{id}','App\Http\Controllers\DisciplinaControllerr@edit');
Route::put('update-disciplina/{id}','App\Http\Controllers\DisciplinasControllerr@update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
