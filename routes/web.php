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
    return view('welcome');
});

Route::get('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/adicionar', 'UsuariosController@create');
Route::post('/usuarios/adicionar', 'UsuariosController@store')->name('post_adicionar_usuarios');
Route::delete('/usuarios/remover/{id}', 'UsuariosController@destroy')->name('delete_remover_usuarios');
Route::get('/usuarios/editar/{id}', 'UsuariosController@show');
Route::put('/usuarios/editar/{id}', 'UsuariosController@update')->name('put_editar_usuarios');