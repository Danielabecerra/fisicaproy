<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
 
// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

//rutas

Route::get('form_nuevo_usuario', 'FormulariosController@form_nuevo_usuario');
Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');


//ruta de docentes
Route::get('formulariod', 'DocenteController@formulariod')->name('docenteformulario');
Route::post('formulariod', 'DocenteController@crear')->name('docentes.crear');
Route::get('formulariod/{id}', 'DocenteController@detalle')->name('docentes.detalle');
Route::get('formulariod/editar/{id}','DocenteController@editar')->name('docentes.editar');
Route::put('formulariod/editar/{id}','DocenteController@update')->name('docentes.update');
Route::delete('formulariod/eliminar/{id}','DocenteController@eliminar')->name('docentes.eliminar');


//ruta de materias
Route::get('formulariom', 'MateriaController@formulariom')->name('materiaformulario');
Route::post('formulariom', 'MateriaController@crear')->name('materias.crear');
Route::get('formulariom/{id}', 'MateriaController@detalle')->name('materias.detalle');
Route::get('formulariom/editar/{id}','MateriaController@editar')->name('materias.editar');
Route::put('formulariom/editar/{id}','MateriaController@update')->name('materias.update');
Route::delete('formulariom/eliminar/{id}','MateriaController@eliminar')->name('materias.eliminar');

//ruta de horario
Route::get('formularioh', 'HorarioController@formularioh')->name('horarioformulario');
Route::post('formularioh', 'HorarioController@crear')->name('horarios.crear');
Route::get('formularioh/{id}', 'HorarioController@detalle')->name('horarios.detalle');
Route::get('formularioh/editar/{id}','HorarioController@editar')->name('horarios.editar');
Route::put('formularioh/editar/{id}','HorarioController@update')->name('horarios.update');
Route::delete('formularioh/eliminar/{id}','HorarioController@eliminar')->name('horarios.eliminar');