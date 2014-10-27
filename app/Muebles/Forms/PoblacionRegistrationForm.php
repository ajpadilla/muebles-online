<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class PoblacionRegistrationForm extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'nombre' => 'required|unique:poblaciones|max:128',
	];
}