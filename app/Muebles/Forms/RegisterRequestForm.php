<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class RegisterRequestForm extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'color' => 'required|alpha|max:128',
		'cantidad' => 'required|numeric|',
		'observacion' => 'min:5,max:256',
		'product_id' => 'required|exists:products,id'
	];
}