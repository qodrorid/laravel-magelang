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

Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
Route::post('/login', ['uses' => 'AuthController@authenticate', 'as' => 'auth.auth']);
Route::get('/logout', ['uses' => 'AuthController@destroy', 'as' => 'auth.destroy']);

Route::group(['middleware' => 'verify.auth'], function() {

    Route::get('/student', 'StudentController@index');
    Route::get('/student/search', ['as' => 'student.search', 'uses' => 'StudentController@search']);
    Route::get('/student/create', ['uses' => 'StudentController@create', 'as' => 'student.create']);
    Route::post('/student/create', ['uses' => 'StudentController@store', 'as' => 'student.store']);
    Route::delete('/student/destroy/{id}',['uses' => 'StudentController@destroy', 'as' => 'student.destroy']);
    Route::get('/student/edit/{id}', ['uses' => 'StudentController@edit', 'as' => 'student.edit']);
    Route::put('/student/update/{id}', ['uses' => 'StudentController@update', 'as' => 'student.update']);

});

