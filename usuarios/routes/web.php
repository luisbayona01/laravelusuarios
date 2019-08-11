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

Route::get('/', function () {
    return view('index');
});

Route::get('/listarusuarios', 'UsuariosController@showUsers')->name('show');
Route::post('/registraruser', 'UsuariosController@registerUsers')->name('registrarU');
Route::post('/editlist','UsuariosController@showeditUsers')->name('usereditlist');
Route::post('/editaruser', 'UsuariosController@updateUsers')->name('editarU');
Route::post('/eliminaruser', 'UsuariosController@deleteUsers')->name('eliminarU');
