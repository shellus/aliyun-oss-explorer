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

Route::get('/', ['as' => 'bucket', 'uses' => 'AliossController@getBucket']);

Route::get('/p', ['as' => 'path', 'uses' => 'AliossController@getPath']);

Route::post('/sign-url', ['as' => 'sign-url', 'uses' => 'AliossController@getSignUrl']);