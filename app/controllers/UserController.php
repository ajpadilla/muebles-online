<?php

use Muebles\Forms\UserRegistrationForm;
use Muebles\Users\RegisterUserCommand;
use Muebles\Core\CommandBus;

class UserController extends \BaseController {

	use CommandBus;

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
		$formData = Input::all();
		$formData['rol'] = 'cliente';
		$formData['activo'] = '0';
		$this->userRegistrationForm->validate($formData);
		extract($formData);
		$user = $this->execute(new RegisterUserCommand($username, $email, $password, $nombres, $apellidos, $codigo_postal, $fax, $movil, $telefono_fijo, $ubicacion, $activo, $rol, $ciudad));
		Flash::success('Sus datos han sido procesados con exito!');
		$nombres = $user->nombres;
		$email = $user->email;
		return Redirect::route('registered_user_path', compact('nombres', 'email'));
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

	public function registered($email, $nombres){
		return View::make('users.registered', compact('email', 'nombres'));
	}


}
