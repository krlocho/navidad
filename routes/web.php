<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablaController;

use App\Http\Controllers\CategoriaController;



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

Route::get('tablas/pdf', [App\Http\Controllers\TablaController::class,'pdf'])->name('tabla.pdf');


Route::get("tablas/qr/{tablas}",[TablaController::class, 'qr'])->name("tabla.qr");

Route::resource('tablas', TablaController::class)->except(['qr','pdf'])->middleware(
    'auth'
)->name('*', 'tablas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

/* Route::resource('tablas', TablaController::class)->middleware(
    'auth'
)->name('*', 'tablas'); */

Route::resource('categorias', CategoriaController::class)->middleware(
    'auth'
)->name('*', 'categorias');





