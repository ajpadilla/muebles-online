<?php namespace Muebles\Forms;
use Laracasts\Validation\FormValidator;

class ProductRegistrationForm extends FormValidator {

	/**
	 * Validation rules for the form.
	 *
	 * @var array
	 */
	protected $rules = [
		'codigo' => 'required|alpha_num|unique:products|max:128',
		'nombre' => 'required|max:128',
		'descripcion' => 'min:5|max:256',
		'modelo' => 'required|max:128',
		'medidas' => 'required|min:5',
		'lacado' => 'required|in:0,1',
		'precio_lacado' => 'required|max:15',
		'pulimento' => 'required|in:0,1',
		'precio_pulimento' => 'required|max:15',
		'precio' => 'required|max:15'
	];
}