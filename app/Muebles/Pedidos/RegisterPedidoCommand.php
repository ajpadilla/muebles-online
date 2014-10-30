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

	function __construct(Product $product, User $client)
	{
		$this->product = $product;
		$this->client = $client;
	}
	
} 