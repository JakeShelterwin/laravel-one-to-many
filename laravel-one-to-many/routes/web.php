<?php

use Illuminate\Support\Facades\Route;
// GESTIONE TASK
Route::get('/', 'TaskController@index')->name("home");

Route::get('/showTask/{id}', 'TaskController@show')->name("showTask");
// crea task
Route::get('/createTask', 'TaskController@create')->name("createTask");

Route::post('/storeTask', 'TaskController@store')->name("storeTask");
// aggiorna task
Route::get('/editTask/{id}', 'TaskController@edit')->name("editTask");

Route::post('/updateTask/{id}', 'TaskController@update')->name("updateTask");

Route::get('/destroyTask/{id}', 'TaskController@destroy')->name("destroyTask");

// GESTIONE EMPLOYEE
Route::get('/showEmployee/{id}', 'EmployeeController@showEmployee')->name("showEmployee");
// crea employee
Route::get('/createEmployee', 'EmployeeController@create')->name("createEmployee");

Route::post('/storeEmployee', 'EmployeeController@store')->name("storeEmployee");

// aggiorna employee
Route::get('/editEmployee/{id}', 'EmployeeController@editEmployee')->name("editEmployee");
//
Route::post('/updateEmployee/{id}', 'EmployeeController@update')->name("updateEmployee");

Route::get('/destroyEmployee/{id}', 'EmployeeController@destroy')->name("destroyEmployee");
