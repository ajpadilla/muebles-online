<?php

use Muebles\Core\CommandBus;
use Muebles\Facturas\FacturasRepository;
use Muebles\Facturas\FinishInvoiceCommand;

class FacturasController extends \BaseController {

	use CommandBus;

	private $repository;

	/**
	 * @param FacturasRepository $repositoryw
	 */
	function __construct(FacturasRepository $repository)
	{
		$this->repository = $repository;
		$this->beforeFilter('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$factura = $this->repository->get($id);
		if(!$factura->finished())
			$factura = $this->execute(new FinishInvoiceCommand($factura));
		$pedidos = $factura->pedidos;
		$client = $factura->client;
		return View::make('facturas.show', compact('pedidos','client', 'factura'));
	}

	public function getPdf($id){
		$factura = $this->repository->get($id);
		$pedidos = $factura->pedidos;
		$client = $factura->client;
		$fileName = $client->nombre. '-' . $factura->updated_at . '.pdf';
		return PDF::loadView('facturas.show-pdf', compact('pedidos', 'client', 'factura'))->stream($fileName);
	}
}
