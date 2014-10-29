<?php namespace Muebles\Users;


use Laracasts\Commander\Events\EventGenerator;
use Muebles\Users\Events\UserActivate;
use Muebles\Users\User;

class UserRepository {

	use EventGenerator;

	/**
	 * Activa un usuario.
	 *
	 * @param $userId
	 * @return mixed
	 */
	public function activateUser(User $user)
	{
		if(!$this->hasActive($user)) {
			$user->activo = true;
			$user->raise(new UserActivate($user));
			return $user->save();
		}
		return false;
	}

	public function hasActive(User $user){
		return $user->activo;
	}

	/**
	 * Persist a user.
	 *
	 * @param User $user
	 * @return mixed
	 */
	public function save(User $user){
		return $user->save();
	}

	public function getAll(){
		return User::all();
	}

	public function getUserId($id)
	{
		return User::find($id);
	}


} 