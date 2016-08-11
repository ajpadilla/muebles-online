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
		'password' => 'required|confirmed',
		'nombre' => 'required|max:128',
		'codigo_postal' => 'required|digits:5',
		'telefono_fijo' => 'digits_between:6,15',
		'fax' => 'digits_between:6,15',
		'direccion' => 'required',
		'rol' => 'required',
		'activo' => 'required|in:0,1',
		'provincia' => 'required|numeric',
	];
}