<?php

use Muebles\Facturas\FacturasRepository;

class FacturasController extends \BaseController {

	private $repository;

	/**
	 * @param FacturasRepository $repository
	 */
	function __construct(FacturasRepository $repository)
	{
		$this->repository = $repository;
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
		$factura->finish = true;
		$factura->save();
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
