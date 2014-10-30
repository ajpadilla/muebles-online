<?php namespace Muebles\Pedidos\Events;

use Muebles\Pedidos\Pedido;

class PedidoRealizado {
	public $pedido;

	function __construct(Pedido $pedido)
	{
		$this->pedido = $pedido;
	}
	
} 