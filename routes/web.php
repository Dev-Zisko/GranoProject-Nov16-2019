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
    return view('grano');
});

Route::get('/grano', 'PageController@view_index')->name('grano');

Route::get('/error', 'PageController@view_error')->name('error');

Auth::routes();

Route::group(['middleware'=>'auth'], function(){

	Route::get('/main', 'PageController@view_login')->name('main');

	Route::get('/pago/{id}', 'PageController@view_pago')->name('pago');

	Route::post('/pago/{id}', 'PageController@register_pago')->name('pago');

	Route::get('/pagou/{id}', 'PageController@view_pagou')->name('pagou');

	Route::post('/pagou/{id}', 'PageController@register_pagou')->name('pagou');

	Route::get('/perfil', 'PageController@view_perfil')->name('perfil');

	Route::post('/perfil', 'PageController@edit_perfil')->name('perfil');

	Route::get('/principal', 'PageController@view_login')->name('principal');

	Route::get('/categorias', 'PageController@view_categorias')->name('categorias');

	Route::get('/categoriasr', 'PageController@view_categoriasr')->name('categoriasr');

	Route::post('/categoriasr', 'PageController@register_categoria')->name('categoriasr');

	Route::get('/categoriasu/{id}', 'PageController@view_categoriasu')->name('categoriasu');

	Route::post('/categoriasu/{id}', 'PageController@update_categoria')->name('categoriasu');

	Route::get('/categoriasd/{id}', 'PageController@view_categoriasd')->name('categoriasd');

	Route::post('/categoriasd/{id}', 'PageController@delete_categoria')->name('categoriasd');

	Route::get('/gastos', 'PageController@view_gastos')->name('gastos');

	Route::get('/gastosr', 'PageController@view_gastosr')->name('gastosr');

	Route::post('/gastosr', 'PageController@register_gasto')->name('gastosr');

	Route::get('/gastosu/{id}', 'PageController@view_gastosu')->name('gastosu');

	Route::post('/gastosu/{id}', 'PageController@update_gasto')->name('gastosu');

	Route::get('/gastosd/{id}', 'PageController@view_gastosd')->name('gastosd');

	Route::post('/gastosd/{id}', 'PageController@delete_gasto')->name('gastosd');

	Route::get('/facturas', 'PageController@view_facturas')->name('facturas');

	Route::get('/facturasr', 'PageController@view_facturasr')->name('facturasr');

	Route::post('/facturasr', 'PageController@register_factura')->name('facturasr');

	Route::get('/facturasd', 'PageController@view_facturasd')->name('facturasd');

	Route::post('/facturasd', 'PageController@delete_facturas')->name('facturasd');

	Route::get('/usuarios', 'PageController@view_usuarios')->name('usuarios');

	Route::get('/usuariosr', 'PageController@view_usuariosr')->name('usuariosr');

	Route::post('/usuariosr', 'PageController@register_usuario')->name('usuariosr');

	Route::get('/usuariosu/{id}', 'PageController@view_usuariosu')->name('usuariosu');

	Route::post('/usuariosu/{id}', 'PageController@update_usuario')->name('usuariosu');

	Route::get('/usuariosd/{id}', 'PageController@view_usuariosd')->name('usuariosd');

	Route::post('/usuariosd/{id}', 'PageController@delete_usuario')->name('usuariosd');

	Route::get('/confirmar/{id}', 'PageController@view_confirmar')->name('confirmar');

	Route::post('/confirmar/{id}', 'PageController@update_estado')->name('confirmar');

	Route::get('/factura/{id}', 'PageController@generate_pdf')->name('factura');

	Route::get('/facturasa', 'PageController@view_facturasa')->name('facturasa');

	Route::get('/pagoa/{id}', 'PageController@view_pagoa')->name('pagoa');

	Route::post('/pagoa/{id}', 'PageController@register_pagoa')->name('pagoa');

	Route::get('/pagoau/{id}', 'PageController@view_pagoau')->name('pagoau');

	Route::post('/pagoau/{id}', 'PageController@register_pagoau')->name('pagoau');

});

Route::get('404', function(){
    abort(404);
});