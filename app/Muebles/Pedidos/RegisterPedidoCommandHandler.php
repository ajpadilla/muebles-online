<?php namespace Muebles\Pedidos;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterPedidoCommandHandler implements CommandHandler {

	use DispatchableTrait;


	/**
	 * @var Repository
	 */
	protected $repository;

	/**
	 * @param UserRepository $repository
	 */
	function __construct(PedidosRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$pedido = new Pedido();
		$pedido->factura()->associate($command->factura);
		$pedido->product()->associate($command->product);
		$pedido->color = $command->color;
		$pedido->cantidad = $command->cantidad;
		$pedido->observacion = $command->observacion;
		$this->repository->save($pedido);
		$this->dispatchEventsFor($pedido);
		return $pedido;
	}

}