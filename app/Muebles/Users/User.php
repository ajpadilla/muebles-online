<?php namespace Muebles\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use Muebles\Users\Events\UserRegistered;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	protected $fillable = ['email', 'password', 'nombre', 'codigo_postal', 'fax', 'telefono_fijo', 'direccion', 'activo', 'rol', 'provincia_id'];

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

	public static function register($email, $password, $nombre, $codigo_postal, $fax, $telefono_fijo, $direccion, $activo, $rol, $provincia_id){
		$user = new static(compact('email', 'password', 'nombre', 'codigo_postal', 'fax', 'telefono_fijo', 'direccion', 'activo', 'rol', 'provincia_id'));
		$user->raise(new UserRegistered($user));
		return $user;
	}
}
