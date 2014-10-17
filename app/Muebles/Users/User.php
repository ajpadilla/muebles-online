<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Passwords must always be hashed.
	 * @param $password
	 */
	public function setPasswordAttribute($password){
		$this->attributes['password'] = Hash::make($password);
	}

	public static function register($username, $email, $password, $nombres, $apellidos, $codigo_postal, $fax, $movil, $telefono_fijo, $ubicacion, $ciudad_id){
		$user = new static(compact('username', 'email', 'password', 'nombres', 'apellidos', 'codigo_postal', 'fax', 'movil', 'telefono_fijo', 'ubicacion', 'ciudad_id'));
		$user->raise(new UserRegistered($user));
		return $user;
	}

}
