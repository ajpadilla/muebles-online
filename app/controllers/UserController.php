<?php

use Muebles\Forms\LoginForm;
use Muebles\Forms\UserRegistrationForm;
use Muebles\Users\ActivateUserCommand;
use Muebles\Users\RegisterUserCommand;
use Muebles\Core\CommandBus;
use Muebles\Users\User;
use Muebles\Users\UserRepository;

class UserController extends \BaseController {

	use CommandBus;

	private $userRepository;

	/**
	 * @var UserRegistrationForm
	 */
	private $userRegistrationForm;

	private $loginForm;

	/**
	 * @param UserRegistrationForm $userRegistrationForm
	 * @param UserRepository $userRepository
	 * @param LoginForm $loginForm
	 */
	function __construct(UserRegistrationForm $userRegistrationForm, UserRepository $userRepository, LoginForm $loginForm)
	{
		$this->userRepository = $userRepository;
		$this->userRegistrationForm = $userRegistrationForm;
		$this->loginForm = $loginForm;
		$this->beforeFilter('guest', ['except' => 'destroySession']);
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
	public function destroySession()
	{
		Auth::logout();
		Flash::message('Has salido del sistema exitosamente!');
		return Redirect::home();
	}

	public function registered($email, $nombres){
		return View::make('users.registered', compact('email', 'nombres'));
	}

	public function activateUser($id){
		// Primero se debe verificar que le usuario autenticado tenga los permisos para esto
		$user = User::findOrFail($id);
		if(!$this->userRepository->hasActive($user)) {
			$user = $this->execute(new ActivateUserCommand($id));
			return View::make('users.user-activate', compact('user'));
		}
		return View::make('users.user-active', compact('user'));
	}

	public function loginCreate()
	{
		return View::make('users.forms.login');
	}

	public function login(){
		$formData = Input::only('email', 'password');
		$this->loginForm->validate($formData);
		if (Auth::attempt($formData))
		{
			Flash::message('Bienvenido!');
			return Redirect::intended('/');
		}
		\Laracasts\Flash\Flash::error('Tus credenciales son incorrectas. Intenta de nuevo!');
		return Redirect::route('login_path')->withInput();
	}

}
