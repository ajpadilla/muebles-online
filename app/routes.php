<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', function () {
	return View::make('pages.home');
});

/**
 * Registration!
 */
Route::get('register', [
	'as' => 'register_user_path',
	'uses' => 'UserController@create'
]);

Route::post('register', [
	'as' => 'register_user_path',
	'uses' => 'UserController@store'
]);