<?php 


Route::group(['middleware' => ['web']], function () {

    Route::resource('imagen','imagenes2APIController');
    });



Route::resource('imagenes3s', 'imagenes3APIController');
 ?>

