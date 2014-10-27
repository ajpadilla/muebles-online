<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class ProvinciasRegistration extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'nombre' => 'required|max:128',
		'poblacion_id'=>'required|numeric'
	];
}