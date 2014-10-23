<?php namespace Muebles\Users; 

use Larabook\Products\Product;
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
			$command->email, $command->password,
			$command->nombre, $command->codigo_postal,
			$command->fax, $command->telefono_fijo,
			$command->direccion, $command->activo, $command->rol, $command->provincia_id);
		$this->repository->save($user);
		$this->dispatchEventsFor($user);
		return $user;
	}

}