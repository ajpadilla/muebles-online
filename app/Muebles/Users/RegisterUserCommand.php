<?php namespace Muebles\Users; 

class RegisterUserCommand  {

	public $email;
	public $password;
	public $nombre;
	public $codigo_postal;
	public $ubicacion;
	public $telefono_fijo;
	public $fax;
	public $provincia_id;
	public $activo;
	public $rol;

	/**
	 * @param $email
	 * @param $password
	 * @param $nombre
	 * @param $codigo_postal
	 * @param $fax
	 * @param $telefono_fijo
	 * @param $ubicacion
	 * @param $activo
	 * @param $rol
	 * @param $provincia_id
	 */
	function __construct($email, $password, $nombre, $codigo_postal, $fax, $telefono_fijo, $direccion, $activo, $rol, $provincia_id)
	{
		$this->provincia_id = $provincia_id;
		$this->codigo_postal = $codigo_postal;
		$this->email = $email;
		$this->fax = $fax;
		$this->nombre = $nombre;
		$this->password = $password;
		$this->telefono_fijo = $telefono_fijo;
		$this->direccion = $direccion;
		$this->activo = $activo;
		$this->rol = $rol;
	}


} 