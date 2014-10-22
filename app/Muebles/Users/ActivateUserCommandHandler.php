<?php namespace Muebles\Users; 

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Muebles\Users\User;

class ActivateUserCommandHandler implements CommandHandler {

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
		$user = User::findOrFail($command->userId);
		$this->repository->activateUser($user);
		$this->dispatchEventsFor($user);
		return $user;
	}

}