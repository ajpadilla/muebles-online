<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class UserRegistrationForm extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'email' => 'required|email|unique:users|max:128',
		'username' => 'required|unique:users|max:128',
		'password' => 'required|confirmed',
		'nombres' => 'required|max:128',
		'apellidos' => 'required|max:128',
		'codigo_postal' => 'required|digits:5',
		'movil' => 'digits_between:6,15',
		'telefono_fijo' => 'digits_between:6,15',
		'fax' => 'digits_between:6,15',
		'ubicacion' => 'required|digits_between:10,256',
		'rol' => 'required',
		'activo' => 'required|in:0,1',
		'ciudad' => 'required|numeric',
	];
}