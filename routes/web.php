<?php

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

Route::get('/', function() {
    return view('cliente.cuenta');
})->middleware('auth');
//Route::get('/empleados','\App\Http\Controllers\EmpleadosController@index');
//Route::get('/empleados/create', '\App\Http\Controllers\EmpleadosController@create');
Route::resource('empleados','\App\Http\Controllers\EmpleadosController');
Auth::routes(['reset'=>false,'register'=>false]);

Route::get('/productos', [App\Http\Controllers\productosController::class, 'index'])->name('productos');

Route::resource('productos', '\App\Http\Controllers\productosController');
Route::resource('prueba', '\App\Http\Controllers\pruebaController');

Route::resource('infousuario', '\App\Http\Controllers\usuario');

Route::resource('categorias', '\App\Http\Controllers\CategoriasController');

Route::get('tablero', function() {
    return view('supervisor.tablero');
});
Route::get('revisar', function() {
    return view('encargado.revisar');
});
Route::get('totalizar', function() {
    return view('contador.totalizar');
});
Route::get('/cuenta', function() {
    return view('cliente.cuenta');
});