<?php namespace Muebles\Pedidos; 

use Muebles\Products\Product;
use Muebles\Users\User;

class RegisterPedidoCommand  {

	/**
	 * @var Product
	 */
	public $product;
	/**
	 * @var User
	 */
	public $client;

	public $color;
	public $cantidad;

	/**
	 * @param Product $product
	 * @param User $client
	 * @param $color
	 * @param $cantidad
	 */
	function __construct(Product $product, User $client, $color, $cantidad)
	{
		$this->product = $product;
		$this->client = $client;
		$this->color = $color;
		$this->cantidad = $cantidad;
	}
	
} 