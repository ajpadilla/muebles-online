<?php namespace Muebles\Users; 

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Muebles\Users\User;

class RegisterUserCommandHandler implements CommandHandler {

	use DispatchableTrait;

	/**
	 * @var Repository
	 */
	protected $repository;

	/**
	 * @param UserRepository $repository
	 */
	function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$user = User::register(
			$command->username, $command->email, $command->password,
			$command->nombres, $command->apellidos, $command->codigo_postal,
			$command->fax, $command->movil, $command->telefono_fijo,
			$command->ubicacion, $command->activo, $command->rol, $command->ciudad_id);
		$this->repository->save($user);
		$this->dispatchEventsFor($user);
		return $user;
	}

}