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

Event::listen('Muebles.Users.Events.UserRegistered', function($event) {
	$user = $event->user;
	if(!$user->activo) {
		Mail::send('users.emails.activate-user', array('user' => $user), function ($message) {
			$message->to('nightzpy@gmail.com', 'Lenyn')
				->from('informacion@presentatenlaweb.com', 'Presentatenlaweb Atención al cliente')
				->subject('Un nuevo usuario se ha registrado!');
		});
		Mail::send('users.emails.activate-user', array('user' => $event->user), function($message)
		{
			$message->to('jose@grupo2.net', 'José Luis Urbano Lopez')
				->from('web@grupo2.net', 'Grupo Dos S.L.')
				->subject('Un nuevo usuario se ha registrado!');
		});
	} else {
		Mail::send('users.emails.user-activate', array('user' => $user), function($message) use ($user)
		{
			$message->to($user->email, $user->nombre)
				->from('web@grupo2.net', 'Grupo Dos S.L.')
				->subject('Felicitaciones: Hemos admitido tu ingreso!');
		});
	}
});

Event::listen('Muebles.Users.Events.UserActivate', function($event) {
	$user = $event->user;
	Mail::send('users.emails.user-activate', array('user' => $user), function($message) use ($user)
	{
		$message->to($user->email, $user->nombre)
			->from('web@grupo2.net', 'Grupo Dos S.L.')
			->subject('Felicitaciones: Hemos admitido tu ingreso!');
	});
});

Event::listen('Muebles.Pedidos.Events.PedidoRealizado', function($event) {
	$pedidos = $event->pedidos;
	$user = Auth::user();
	Mail::send('pedidos.emails.pedido-realizado', compact('pedidos'), function($message) use ($user)
	{
		$message->to($user->email, $user->nombre)
			->from('web@grupo2.net', 'Grupo Dos S.L.')
			->subject('Su pedido ha sido procesado!');
	});

	Mail::send('pedidos.emails.pedido-realizado', compact('pedidos'), function($message) use ($user)
	{
		//$message->to('nightzpy@gmail.com', 'Lenyn')
		$message->to('jose@grupo2.net', 'José Luis Urbano Lopez')
			->from($user->email, $user->nombre)
			->subject('Un pedido ha sido realizado!');
	});
});



Route::get('/error-404', [
	'as' => 'error_path',
	'uses' => 'PagesController@error404'
]);

/**
 * Main Pages
 */
Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

Route::get('/ubicacion', [
	'as' => 'address_path',
	'uses' => 'PagesController@address'
]);

Route::get('/acerca', [
	'as' => 'about_path',
	'uses' => 'PagesController@about'
]);

/**
 * Contacto routes
 */
Route::get('contacto', [
	'as' => 'contact_path',
	'uses' => 'PagesController@contactForm'
]);

Route::post('contacto', [
	'as' => 'contact_path',
	'uses' => 'PagesController@processContact'
]);

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

Route::get('user-registered/{email}/{nombres}', [
	'as' => 'registered_user_path',
	'uses' => 'UserController@registered'
]);

Route::get('activate-user/{id}', [
	'as' => 'activate_user_path',
	'uses' => 'UserController@activateUser'
]);

Route::get('login', [
	'as' => 'login_path',
	'uses' => 'UserController@loginCreate'
]);

Route::post('login', [
	'as' => 'login_path',
	'uses' => 'UserController@login'
]);

Route::resource('users','UserController');
Route::get('borrar/{id}','UserController@destroy');

// Datatable Users
Route::get('api/users', array('as'=>'api.users', 'uses'=>'UserController@getDatatable'));

/**
 * Destroy session
 */
Route::get('logout', [
	'as' => 'logout_path',
	'uses' => 'UserController@destroySession'
]);

/**
 * Catalogo routes
 */
Route::resource('products', 'ProductsController');
Route::get('borrarProduct/{id}','ProductsController@destroy');
Route::get('products/filtered/{filterWord}', [
	'as' => 'filtered_products_path',
	'uses' => 'ProductsController@filteredProducts'
]);

/**
 * Pedidos routes
 */
Route::resource('pedidos', 'PedidosController', ['except' => ['create', 'show']]);

Route::get('pedidos/create/{productId}', [
	'as' => 'pedidos.create',
	'uses' => 'PedidosController@create'
]);

/**
 * Facturas routes
 */
Route::resource('facturas', 'FacturasController');
Route::get('pdf-factura/{facturaId}', [
	'as' => 'pdf_invoice_path',
	'uses' => 'FacturasController@getPdf'
]);

/**
 * Photos routes
 */
Route::get('photos/create/{productId}', [
	'as' => 'photos.create',
	'uses' => 'PhotosController@create'
]);
Route::resource('photos', 'PhotosController', ['except' => ['create']]);

/**
 * Chumper/Datatables routes
 */
Route::get('api/products', array('as'=>'api.products', 'uses'=>'ProductsController@getDatatable'));


//Poblaciones
Route::get('poblaciones/register', [
	'as' => 'poblaciones_register_path',
	'uses' => 'PoblacionController@create'
]);

Route::post('poblaciones/register', [
	'as' => 'poblaciones_register_path',
	'uses' => 'PoblacionController@store'
]);

Route::get('poblaciones', [
	'as' => 'poblaciones_path',
	'uses' => 'PoblacionController@index'
]);


//Provincias
Route::get('provincias/register', [
	'as' => 'provincias_register_path',
	'uses' => 'ProvinciasController@create'
]);

Route::post('provincias/register', [
	'as' => 'provincias_register_path',
	'uses' => 'ProvinciasController@store'
]);

Route::get('provincias', [
	'as' => 'provincias_path',
	'uses' => 'ProvinciasController@index'
]);
