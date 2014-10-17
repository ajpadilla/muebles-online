<?php

use Muebles\Forms\UserRegistrationForm;
use Muebles\Users\RegisterUserCommand;
use Muebles\Core\CommandBus;

class UserController extends \BaseController {

	/**
	 * @var UserRegistrationForm
	 */
	private $userRegistrationForm;

	/**
	 * @param UserRegistrationForm $userRegistrationForm
	 */
	function __construct(UserRegistrationForm $userRegistrationForm)
	{
		$this->userRegistrationForm = $userRegistrationForm;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ciudades = ['1' => 'Madrid', '2' => 'Barcelona'];
		return View::make('users.create', compact('ciudades'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->userRegistrationForm->validate(Input::all());
		extract(Input::only('username', 'email', 'password', 'nombres', 'apellidos', 'codigo_postal', 'fax', 'movil', 'telefono_fijo', 'ubicacion', 'ciudad_id'));
		$user = $this->execute(new RegisterUserCommand($username, $email, $password, $nombres, $apellidos, $codigo_postal, $fax, $movil, $telefono_fijo, $ubicacion, $ciudad_id));
		Flash::success('New Larabook member!');
		return Redirect::home();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
