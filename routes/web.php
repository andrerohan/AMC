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


//Route::get('/', 'HomeController@index');
Route::get('/admin', 'HomeController@admin');

Route::view('/', 'layouts.website.index');


Route::resource('/admin/clientes', 'ClienteController');
Route::resource('/admin/dynamics', 'DynamicController');
Route::resource('/admin/veiculos', 'VeiculoController');

Route::resource('/admin/users', 'UserController');
//Route::get('/admin/users/profile','UserController@profile');

Route::resource('/admin/reparacoes', 'ReparacaoController');
Route::resource('/admin/reparacoesdetails', 'ReparacaoDetailsController');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
