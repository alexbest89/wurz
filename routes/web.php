<?php

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

//Route::get('/inserisciParametri','introController@index');
//Route::get('/inserisciParametri/salva','introController@inserisciParametri')->name('salva');

Route::get('/','introController@index')->name('index');


Route::get('/home', 'introController@index')->name('home');

Auth::routes();

Route::get('/infoneg','introController@Negozio')->name('info');
Route::get('/salvainfo','introController@SalvaInfoNegozio')->name('SalvaInfoNegozio');
Route::get('/updateinfonegozio','introController@updateInfoNegozio')->name('updateInfoNegozio');

Route::resource('/calendario','TaskController');
