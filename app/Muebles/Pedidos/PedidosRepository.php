<?php namespace Muebles\Pedidos;

class PedidosRepository {
	/**
	 * Persist a pedido.
	 *
	 * @param Pedido $pedido
	 * @return mixed
	 */
	public function save(Pedido $pedido){
		return $pedido->save();
	}

	public function get($id){
		return Pedido::findOrFail($id);
	}

} 