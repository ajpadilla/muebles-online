<?php namespace Muebles\Products;

class RegisterProductCommand  {

	public $codigo;
	public $nombre;
	public $descripcion;
	public $modelo;
	public $medidas;
	public $lacado;
	public $precio_lacado;
	public $pulimento;
	public $precio_pulimento;
	public $cantidad;
	public $precio;

	function __construct($codigo, $nombre, $descripcion, $modelo, $medidas, $lacado, $precio_lacado, $pulimento, $precio_pulimento, $cantidad, $precio)
	{
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->modelo = $modelo;
		$this->medidas = $medidas;
		$this->lacado = $lacado;
		$this->precio_lacado = $precio_lacado;
		$this->pulimento = $pulimento;
		$this->precio_pulimento = $precio_pulimento;
		$this->cantidad = $cantidad;
		$this->precio = $precio;
	}
	
} 