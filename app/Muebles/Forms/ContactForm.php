<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class ContactForm extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'nombre' => 'required|max:128',
		'email' => 'required|email|unique:users|max:128',
		'mensaje' => 'required|min:20|max:256',
		'asunto' => 'min:4',
		'website' => 'url'
	];
}