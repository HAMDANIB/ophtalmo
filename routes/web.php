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

/* Route::get('/', function () {
    return view('chirurgie');
}); */
/* Route::get('/', 'ChirurgieController@index'); */
Route::get('/', 'Liste_attenteController@index');
Route::get('/FicheMalade', 'FichemaladeController@index');
Route::get('/DepensesJ', 'depensescontroller@depensesJ');
Route::get('/DepensesM', 'depensescontroller@depensesM');
Route::get('/DepensesA', 'depensescontroller@depensesA');

Route::get('/filtrer/{currentDate}', 'Liste_attenteController@filtreListeAttente')->name('Filrer');
Route::get('/filtrerNR/{currentDate}', 'FichemaladeController@filtreNewRegistre')->name('FilrerNR');
Route::get('/filtrerDepJ/{currentDate}', 'depensescontroller@filtredepensesJ')->name('FilrerDepJ');
Route::get('/filtrerDepM/{MonthFilt}/{YearFilt}', 'depensescontroller@filtrerDepM')->name('FiltrerDepM');



/* Route::group([
    'prefix' => 'wilayas',
], function () {
    Route::get('/', 'WilayasController@index')
         ->name('wilayas.wilayas.index');
    Route::get('/create','WilayasController@create')
         ->name('wilayas.wilayas.create');
    Route::get('/show/{wilayas}','WilayasController@show')
         ->name('wilayas.wilayas.show')->where('id', '[0-9]+');
    Route::get('/{wilayas}/edit','WilayasController@edit')
         ->name('wilayas.wilayas.edit')->where('id', '[0-9]+');
    Route::post('/', 'WilayasController@store')
         ->name('wilayas.wilayas.store');
    Route::put('wilayas/{wilayas}', 'WilayasController@update')
         ->name('wilayas.wilayas.update')->where('id', '[0-9]+');
    Route::delete('/wilayas/{wilayas}','WilayasController@destroy')
         ->name('wilayas.wilayas.destroy')->where('id', '[0-9]+');
}); */
/* 
Route::group([
    'prefix' => 'corps',
], function () {
    Route::get('/', 'CorpsController@index')
         ->name('corps.corps.index');
    Route::get('/create','CorpsController@create')
         ->name('corps.corps.create');
    Route::get('/show/{corps}','CorpsController@show')
         ->name('corps.corps.show')->where('id', '[0-9]+');
    Route::get('/{corps}/edit','CorpsController@edit')
         ->name('corps.corps.edit')->where('id', '[0-9]+');
    Route::post('/', 'CorpsController@store')
         ->name('corps.corps.store');
    Route::put('corps/{corps}', 'CorpsController@update')
         ->name('corps.corps.update')->where('id', '[0-9]+');
    Route::delete('/corps/{corps}','CorpsController@destroy')
         ->name('corps.corps.destroy')->where('id', '[0-9]+');
}); 
 */