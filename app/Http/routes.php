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


Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('inscripcion/{id}','InscripcionController@pagina');
    Route::resource('representante','RegistroRepresentanteController');
    Route::resource('deportista','RegistroDeportistaController');
    Route::resource('disciplina','RegistroDisciplinaController');
    Route::get('horarios/{id}','RegistroDisciplinaController@getHorarios');
    Route::resource('fichainscripcion','FichaInscripcionController');

    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('system/representante','RepresentanteController');
    Route::resource('system/deportista','DeportistaController');

    Route::resource('system/pago-inscripcion','PagoFichaController');
    Route::get('system/pago-inscripcion/printficha/{id}','PagoFichaController@getPrintFicha');

    Route::resource('system/ventas','VentasController');
    Route::get('system/ventas/printcomprobante/{id}','VentasController@getPrintComprobante');

    Route::resource('system/mensualidad', 'MensualidadController');

    Route::resource('system/productos', 'ProductosController');
});