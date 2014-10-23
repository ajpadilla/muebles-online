<?php namespace Larabook\Products; 

class RegisterProductCommand  {

	private $codigo;
	private $nombre;
	private $descripcion;
	private $modelo;
	private $medidas;
	private $lacado;
	private $precio_lacado;
	private $pulimento;
	private $precio_pulimento;
	private $cantidad;
	private $precio;

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