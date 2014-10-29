<?php

use Muebles\Core\CommandBus;
use Muebles\Forms\LoginForm;
use Muebles\Forms\UserRegistrationForm;
use Muebles\Users\ActivateUserCommand;
use Muebles\Users\RegisterUserCommand;
use Muebles\Users\User;
use Muebles\Users\UserRepository;
use Muebles\Poblaciones\PoblacionesReposotory;
use Muebles\Provincias\ProvinciaRepository;

class UserController extends \BaseController {

	use CommandBus;

	private $userRepository;

	/**
	 * @var UserRegistrationForm
	 */
	private $userRegistrationForm;

	private $loginForm;

	private $poblacionesReposotory;

	private $provinciaReposotory;

	/**
	 * @param UserRegistrationForm $userRegistrationForm
	 * @param UserRepository $userRepository
	 * @param LoginForm $loginForm
	 */
	function __construct(UserRegistrationForm $userRegistrationForm, UserRepository $userRepository, LoginForm $loginForm, PoblacionesReposotory $poblacionesReposotory,ProvinciaRepository $provinciaReposotory) {
		$this->userRepository       = $userRepository;
		$this->userRegistrationForm = $userRegistrationForm;
		$this->loginForm            = $loginForm;
		$this->poblacionesReposotory = $poblacionesReposotory;
		$this->provinciaReposotory = $provinciaReposotory;
		$this->beforeFilter('guest', ['except' => ['destroySession', 'activateUser']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$users = $this->userRepository->getAll();
		return View::make('users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		$poblaciones = ['1' => 'Madrid', '2' => 'Barcelona'];
		$provincias = ['1' => 'Madrid', '2' => 'Cataluya'];
		return View::make('users.create', compact('poblaciones', 'provincias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store()
	{
		$formData = Input::all();
		$formData['rol'] = $this->userRepository->rol();
		$formData['activo'] = ($formData['rol'] == 'admin' ? '1' : '0');
		$this->userRegistrationForm->validate($formData);
		extract($formData);
		$user = $this->execute(new RegisterUserCommand($email, $password, $nombre, $codigo_postal, $fax, $telefono_fijo, $direccion, $activo, $rol, $provincia));
		Flash::success('Sus datos han sido procesados con exito!');
		$nombre = $user->nombre;
		$email = $user->email;
		return Redirect::route('registered_user_path', compact('nombre', 'email'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$user = $this->userRepository->getUserId($id);
		$poblaciones = $this->poblacionesReposotory->getAll()->lists('nombre', 'id');
		$provincias = $this->provinciaReposotory->getAll()->lists('nombre', 'id');
		return View::make('users.show',compact('user','poblaciones', 'provincias'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$user = $this->userRepository->getUserId($id);
		$poblaciones = $this->poblacionesReposotory->getAll()->lists('nombre', 'id');
		$provincias = $this->provinciaReposotory->getAll()->lists('nombre', 'id');
		return View::make('users.edit',compact('user','poblaciones', 'provincias'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$user = $this->userRepository->getUserId($id);
		$user->activo = Input::get('activo');
		$user->nombre = Input::get('nombre');
		$user->nombre_comercial = Input::get('nombre_comercial');
		$user->direccion = Input::get('direccion');
		$user->codigo_postal = Input::get('codigo_postal');
		$user->provincia_id = Input::get('provincia');
		$user->telefono_fijo = Input::get('telefono_fijo');
		$user->fax = Input::get('fax');
		$user->email = Input::get('email');
		$user->save();
		Flash::message('Otro nombre ha sido actualizado con éxito!');
		return Redirect::to('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$user = $this->userRepository->getUserId($id);
		$user->delete();
		Flash::message('usuario borrado  con éxito!');
		return Redirect::to('users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroySession() {
		Auth::logout();
		Flash::message('Has salido del sistema exitosamente!');
		return Redirect::home();
	}

	/**
	 * @param $email
	 * @param $nombre
	 * @return mixed
	 */
	public function registered($email, $nombre){
		return View::make('users.registered', compact('email', 'nombre'));
	}

	public function activateUser($id) {
		// Primero se debe verificar que le usuario autenticado tenga los permisos para esto
		$user = User::findOrFail($id);
		if (!$this->userRepository->hasActive($user)) {
			$user = $this->execute(new ActivateUserCommand($id));
			return View::make('users.user-activate', compact('user'));
		}
		return View::make('users.user-active', compact('user'));
	}

	public function loginCreate() {
		return View::make('users.forms.login');
	}

	public function login() {
		$formData = Input::only('email', 'password');
		$this->loginForm->validate($formData);
		$message = 'Tus credenciales son incorrectas. Intenta de nuevo!';
		if (Auth::attempt($formData)) {
			if (Auth::user()->activo) {
				Flash::message('Bienvenido!');
				return Redirect::intended('/');
			}
			Auth::logout();
			$message = 'El usuario se encuentra inactivo!';
		}
		\Laracasts\Flash\Flash::error($message);
		return Redirect::route('login_path')->withInput();
	}

	public function getDatatable()
	{
		$collection = Datatable::collection($this->userRepository->getAll())
			->showColumns('nombre', 'direccion', 'codigo_postal', 'telefono_fijo', 'fax', 'email', 'rol', 'activo')
			->searchColumns('nombre', 'email')
			->orderColumns('nombre', 'email');

		$collection->addColumn('provincia', function($model)
		{
			 return $model->provincia->nombre;
		});
		
		$collection->addColumn('Acciones',function($model){
			$links = "<a href='" . route('users.show', $model->id) . "'>Ver</a>
					<br />";
			$links .= "<a href='" . route('users.edit', $model->id) . "'>Editar</a>
					<br />
					<a href='" . URL::to('borrar/'.$model->id) . "'>Eliminar</a>";

			return $links;
		});

		return $collection->make();
	}
}
