<?php namespace Muebles\Facturas;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Muebles\Facturas\Events\FacturaRealizada;

class FinishInvoiceCommandHandler implements CommandHandler {
	use DispatchableTrait;

	/**
	 * @var Repository
	 */
	protected $repository;

	function __construct(FacturasRepository $repository)
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
		$factura = $command->factura;
		$factura->finish = true;
		$factura->save();
		$factura->raise(new FacturaRealizada($factura));
		$this->dispatchEventsFor($factura);
		return $factura;
	}

}