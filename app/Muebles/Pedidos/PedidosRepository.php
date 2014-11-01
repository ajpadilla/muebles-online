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

	public function ordersForInvoice($facturaId)
	{
		return Pedido::select()->where('factura_id', '=' , $facturaId)->get();
	}
} 