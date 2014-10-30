<?php namespace Muebles\Pedidos;

use Laracasts\Commander\Events\EventGenerator;
use Muebles\Pedidos\Events\PedidoRealizado;

class PedidosRepository {

	use EventGenerator;

	/**
	 * Persist a pedido.
	 *
	 * @param Pedido $pedido
	 * @return mixed
	 */
	public function save(Pedido $pedido){
		$pedido->raise(new PedidoRealizado($pedido));
		return $pedido->save();
	}

	public function get($id){
		return Pedido::findOrFail($id);
	}

} 