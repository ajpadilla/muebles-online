<?php namespace Muebles\Pedidos; 

use Muebles\Facturas\Factura;
use Muebles\Products\Product;

class RegisterPedidoCommand  {

	/**
	 * @var Product
	 */
	public $product;

	public $color;
	public $cantidad;
	/**
	 * @var Factura
	 */
	public $factura;
	/**
	 * @var null
	 */
	public $observacion;
	/**
	 * @var null
	 */
	public $nombre_cliente;
	/**
	 * @var null
	 */
	public $direccion;

	/**
	 * @param Product $product
	 * @param $color
	 * @param $cantidad
	 */
	function __construct(Product $product, Factura $factura, $cantidad,  $color, $observacion = null, $nombre_cliente = null, $direccion = null)
	{
		$this->product = $product;
		$this->color = $color;
		$this->cantidad = $cantidad;
		$this->factura = $factura;
		$this->observacion = $observacion;
		$this->nombre_cliente = $nombre_cliente;
		$this->direccion = $direccion;
	}
	
} 