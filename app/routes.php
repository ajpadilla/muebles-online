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
		Mail::send('users.emails.activate-user', array('user' => $user), function ($message)  use ($user) {
			$message->to(getenv('SYSTEM_EMAIL'), getenv('SYSTEM_EMAIL_NAME'))
				->from($user->email, $user->nombre)
				->subject('Un nuevo usuario se ha registrado!');
		});
	} else {
		Mail::send('users.emails.user-activate', array('user' => $user), function($message) use ($user)
		{
			$message->to($user->email, $user->nombre)
				->from(getenv('SYSTEM_EMAIL'), getenv('SYSTEM_EMAIL_NAME'))
				->subject('Felicitaciones: Hemos admitido tu ingreso!');
		});
	}
});

Event::listen('Muebles.Users.Events.UserActivate', function($event) {
	$user = $event->user;
	Mail::send('users.emails.user-activate', array('user' => $user), function($message) use ($user)
	{
		$message->to($user->email, $user->nombre)
			->from(getenv('SYSTEM_EMAIL'), getenv('SYSTEM_EMAIL_NAME'))
			->subject('Felicitaciones: Hemos admitido tu ingreso!');
	});
});

Event::listen('Muebles.Facturas.Events.FacturaRealizada', function($event) {
	$factura = $event->factura;
	$pedidos = $factura->pedidos;
	$client  = $factura->client;
	Mail::send('facturas.emails.factura-realizada', compact('pedidos', 'client', 'factura'), function($message) use ($client)
	{
		$message->to($client->email, $client->nombre)
			->from(getenv('SYSTEM_EMAIL'), getenv('SYSTEM_EMAIL_NAME'))
			->subject('Su pedido ha sido procesado!');
	});
	Mail::send('facturas.emails.factura-realizada', compact('pedidos', 'client', 'factura'), function($message) use ($client)
	{
		$message->to(getenv('SYSTEM_EMAIL'), getenv('SYSTEM_EMAIL_NAME'))
			->from($client->email, $client->nombre)
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
Route::resource('products', 'ProductsController', ['except' => ['show']]);
Route::get('borrarProduct/{id}','ProductsController@destroy');

Route::post('productos-filtrados', [
	'as' => 'filtered_products_path',
	'uses' => 'ProductsController@filteredProducts'
]);

Route::get('products/{id}/{photoId?}', [
	'as' => 'products.show',
	'uses' => 'ProductsController@show'
]);

Route::get('importCSV', [
	'as' => 'products.import-csv',
	'uses' => 'ProductsController@importCSVForm'
]);

Route::post('importCSV', [
	'as' => 'products.import-csv',
	'uses' => 'ProductsController@importCSV'
]);

/**
 * Pedidos routes
 */
Route::resource('pedidos', 'PedidosController', ['except' => ['create', 'show', 'index']]);

Route::get('pedidos/create/{productId}', [
	'as' => 'pedidos.create',
	'uses' => 'PedidosController@create'
]);

Route::get('pedidos-por-factura/{facturaId}', [
	'as' => 'pedidos.index',
	'uses' => 'PedidosController@index'
]);


Route::get('api/pedidos', array('as'=>'api.pedidos', 'uses'=>'PedidosController@getDatatable'));


/**
 * Facturas routes
 */
Route::resource('facturas', 'FacturasController', ['except' => ['index']]);

Route::get('pdf-pedidos/{facturaId}', [
	'as' => 'pdf_invoice_path',
	'uses' => 'FacturasController@getPdf'
]);

Route::get('pedidos', [
	'as' => 'facturas.index',
	'uses' => 'FacturasController@index'
]);

Route::get('api/facturas', array('as'=>'api.facturas', 'uses'=>'FacturasController@getDatatable'));
Route::get('api/facturasCliente', array('as'=>'api.facturasCliente', 'uses'=>'FacturasController@getDatatableCliente'));


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

Route::get('cargarPoblaciones','PoblacionController@cargarPoblaciones');

//Provincias
Route::get('provincias/register', [
	'as' => 'provincias_register_path',
	'uses' => 'ProvinciasController@create'
]);

Route::post('provincias/register', [
	'as' => 'provincias_register_path',
	'uses' => 'ProvinciasController@store'
]);

Route::get('cargarProvincias','ProvinciasController@cargarProvincias');

Route::get('cargarProvincias2','ProvinciasController@cargarProvincias2');

Route::get('provincias', [
	'as' => 'provincias_path',
	'uses' => 'ProvinciasController@index'
]);
