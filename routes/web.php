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
Route::group(['prefix' => 'api/v1'], function (){
    Route::resource('appointment', 'AppointmentController',[
        'except' => ['edit', 'create']
    ]);

    Route::resource('appointment/registration ', 'RegistrationController',[
        'only' => ['store', 'destroy']
    ]);

    Route::post('user', [
        'user' => 'AuthController@store'
    ]);

    Route::post('user/signin', [
        'user' => 'AuthController@signin'
    ]);
});
