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

Route::get('user', ['uses'=>'UtilisateurController@index', 'as'=>'user.list']);
Route::get('user/create', ['uses'=>'UtilisateurController@create', 'as'=>'user.create']);
Route::post('user/store', ['uses'=>'UtilisateurController@store', 'as'=>'user.store']);
Route::get('user/edit/{id}', ['uses'=>'UtilisateurController@edit', 'as'=>'user.edit'])->where('id', '[0-9]+');
Route::post('user/update/{id}', ['uses'=>'UtilisateurController@update', 'as'=>'user.update'])->where('id', '[0-9]+');
Route::get('user/delete/{id}', ['uses'=>'UtilisateurController@delete', 'as'=>'user.delete'])->where('id', '[0-9]+');
