<?php namespace Muebles\Pedidos;

use Laracasts\Commander\Events\EventGenerator;
use Muebles\Pedidos\Events\PedidoRealizado;
use Muebles\Users\User;

class PedidosRepository {

	use EventGenerator;

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

	public function getAllWhithoudFinish(User $user){
		return $user->pedidos()->where('status', '=', 0)->get();
	}

	public function finishRequest($pedidos){
		foreach($pedidos as $pedido)
		{
			$pedido->status = 1;
			$pedido->save();
		}
		$this->raise(new PedidoRealizado($pedidos));
	}

} 