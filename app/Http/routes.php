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
Route::resource('Movie','MovieController@index');



//genera multiple rutas para procesar metodos(index, create, etc)


//este es el posta

Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');




Route::group(['middleware' => ['web']], function () {

    Route::resource('usuario','UsuarioController');
    });


/*Route::group(['middleware' => 'web'], function () {
    Route::get('usuario','UsuarioController');
});﻿
*/


//fin

/*Route:: get('prueba', function(){

	return "Hola desde router.php";
	});

Route:: get('nombre/{nombre}',function($nombre){

	return "Hola usted es: ".$nombre;
} );

Route:: get('nombre/{nombre?}',function($nombre = 'lala'){

	return "Hola usted es: ".$nombre;
} );

Route:: get('controlador','PruebaControlador@index');

Route:: get('name/{nombre?}','PruebaControlador@nombre');
*/
/*

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('index');
    });



});
Route::group(['middleware' => ['web']], function () {

    Route::get('admin', function () {
        return view('admin');
    });



});
Route::group(['middleware' => ['web']], function () {

    Route::get('reviews', function () {
        return view('reviews');
    });



});
Route::group(['middleware' => ['web']], function () {

    Route::get('contacto', function () {
        return view('contacto');
    });



});
*/

Route::resource('tipos', 'tipoController');

Route::resource('imagenes3s', 'imagenes3Controller');