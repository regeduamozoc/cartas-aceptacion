<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AyuntdetalleController;

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
    return view('auth.login');
});
Route::get('/redirects',[HomeController::class,"index"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('redirects','App\Http\Controllers\HomeController@index');

Route::resource('admin', EstudianteController::class)->middleware('auth');

Route::get('/admin/GenerarCarta/{id}', 'App\Http\Controllers\EstudianteController@GenerarCarta')->middleware('auth');

Route::get('/admin/cartaPDF/{id}', 'App\Http\Controllers\EstudianteController@cartaPDF')->middleware('auth');

Route::resource('alumno', EstudianteController::class)->middleware('auth');

Route::resource('admin/institucion', InstitucionController::class)->middleware('auth');

Route::resource('admin/carrera', CarreraController::class)->middleware('auth');

Route::resource('admin/servicio', ServicioController::class)->middleware('auth');

Route::resource('admin/proyecto', ProyectoController::class)->middleware('auth');

Route::resource('admin/ayuntamiento', AyuntdetalleController::class)->middleware('auth');




