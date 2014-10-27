<?php namespace Muebles\Forms;

use Laracasts\Validation\FormValidator;

class LoginForm extends FormValidator {

	/**
	 * Validation rules for the registration form.
	 *
	 * @var array
	 */
	protected $rules = [
		'email' => 'required',
		'password' => 'required'
	];
}
