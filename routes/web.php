<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HerramientaController;
use App\Http\controllers\PrestamoController;
use App\Http\Controllers\PdfController;


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
Route::get('generate-pdf', [PdfController::class, 'generatePdf']);
Route::resource('/alumno', AlumnoController::class);
Route::resource('/categorias', CategoriaController::class);
Route::resource('/herramienta', HerramientaController::class);
Route::resource('/prestamo', PrestamoController::class);
Route::get('/buscador', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// returns the home page with all categoria
Route::get('/cat', CategoriaController::class .'@index')->name('categoria.index');
// returns the form for adding a post
Route::get('/categoria/create', CategoriaController::class .'@create')->name('categoria.create');
// adds a post to the database
Route::post('/categoria', CategoriaController::class .'@store')->name('categoria.store');
// returns a page that shows a full post
Route::get('/categoria/{categoria}', CategoriaController::class .'@show')->name('categoria.show');
// returns the form for editing a post
Route::get('/categoria/{categoria}/edit', CategoriaController::class .'@edit')->name('Categoria.edit');
// updates a post
Route::put('/categoria/{categoria}', CategoriaController::class .'@update')->name('categoria.update');
// deletes a post
Route::delete('/categoria/{categoria}', CategoriaController::class .'@destroy')->name('categoria.destroy');
*/