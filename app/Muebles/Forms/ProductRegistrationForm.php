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
		'medidas' => 'required|min:5',
		'precio_lacado' => 'required|max:15',
		'precio_lacado_puntos' => 'required|max:11',
		'precio_pulimento' => 'required|max:15',
		'precio_pulimento_puntos' => 'required|max:11',
	];
}