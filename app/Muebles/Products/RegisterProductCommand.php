<?php namespace Muebles\Products;

class RegisterProductCommand  {

	public $codigo;
	public $nombre;
	public $descripcion;
	public $medidas;
	public $precio_lacado;
	public $precio_lacado_puntos;
	public $precio_pulimento;
	public $precio_pulimento_puntos;
	public $cantidad;
	public $precio;

	function __construct($codigo, $nombre, $descripcion, $medidas, $precio_lacado, $precio_lacado_puntos, $precio_pulimento, $precio_pulimento_puntos, $cantidad, $precio)
	{
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->medidas = $medidas;
		$this->precio_lacado = $precio_lacado;
		$this->precio_lacado_puntos = $precio_lacado_puntos;
		$this->precio_pulimento = $precio_pulimento;
		$this->precio_pulimento_puntos = $precio_pulimento_puntos;
		$this->cantidad = $cantidad;
		$this->precio = $precio;
	}
	
} 