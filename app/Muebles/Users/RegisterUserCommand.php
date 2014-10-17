<?php namespace Muebles\Users; 

class RegisterUserCommand  {

	public $username;
	public $email;
	public $password;
	public $nombres;
	public $apellidos;
	public $codigo_postal;
	public $ubicacion;
	public $movil;
	public $telefono_fijo;
	public $fax;
	public $ciudad_id;
	public $activo;
	public $rol;

	/**
	 * @param $username
	 * @param $email
	 * @param $password
	 * @param $nombres
	 * @param $apellidos
	 * @param $codigo_postal
	 * @param $fax
	 * @param $movil
	 * @param $telefono_fijo
	 * @param $ubicacion
	 * @param $activo
	 * @param $rol
	 * @param $ciudad_id
	 */
	function __construct($username, $email, $password, $nombres, $apellidos, $codigo_postal, $fax, $movil, $telefono_fijo, $ubicacion, $activo, $rol, $ciudad_id)
	{
		$this->apellidos = $apellidos;
		$this->ciudad_id = $ciudad_id;
		$this->codigo_postal = $codigo_postal;
		$this->email = $email;
		$this->fax = $fax;
		$this->movil = $movil;
		$this->nombres = $nombres;
		$this->password = $password;
		$this->telefono_fijo = $telefono_fijo;
		$this->ubicacion = $ubicacion;
		$this->username = $username;
		$this->activo = $activo;
		$this->rol = $rol;
	}


} 