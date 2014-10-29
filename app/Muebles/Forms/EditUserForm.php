<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class EditUserForm extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'email' => 'required|email|max:128',
		'nombre' => 'required|max:128',
		'codigo_postal' => 'required|digits:5',
		'telefono_fijo' => 'digits_between:6,15',
		'fax' => 'digits_between:6,15',
		'direccion' => 'required|digits_between:10,256',
		'rol' => 'required',
		'activo' => 'required|in:0,1',
		'provincia' => 'required|numeric',
	];
}