<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TaskController@index')->name("home");

Route::get('/showTask/{id}', 'TaskController@show')->name("showTask");
// crea task
Route::get('/createTask', 'TaskController@create')->name("createTask");

Route::post('/storeTask', 'TaskController@store')->name("storeTask");
//
// aggiorna task
Route::get('/editTask/{id}', 'TaskController@edit')->name("editTask");

Route::post('/updateTask/{id}', 'TaskController@update')->name("updateTask");

Route::get('/destroyTask/{id}', 'TaskController@destroy')->name("destroyTask");
