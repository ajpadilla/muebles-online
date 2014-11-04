<?php namespace Muebles\Forms;

use Laracasts\Validation\FormValidator;

class ImportCSVForm extends FormValidator {

	/**
	 * Validation rules for the registration form.
	 *
	 * @var array
	 */
	protected $rules = [
		'csv' => 'required|mimes:csv,xls'
	];
}
