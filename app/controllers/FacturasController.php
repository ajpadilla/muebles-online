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

		if (Auth::user()->isAdmin()) {
			return View::make('facturas.index');
		} else {
			if(Auth::user()->isClient()){
				Session::put('idCliente',Auth::user()->id);
				return View::make('facturas.index');
			}
		}
		

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


	public function getDatatable()
	{
		$collection = Datatable::collection($this->repository->getAll())
			->showColumns('created_at','client_id','finish')
			->searchColumns('created_at', 'client_id','finish')
			->orderColumns('created_at', 'client_id','finish');

		
		$collection->addColumn('created_at', function($model)
		{
			return date("Y-m-d H:i:s",strtotime($model->created_at));
		});

		$collection->addColumn('client_id', function($model)
		{
			 return $model->client->nombre;
		});

		$collection->addColumn('finish', function($model)
		{
			 return $this->repository->getStatus($model);
		});
		
		$collection->addColumn('Acciones',function($model){
			$links = '';

			if(Auth::check() AND Auth::user()->rol == 'admin') {
				foreach ($model->pedidos as $pedido) {
					return $links .= "<a href='" . route('pedidos.index', $model->id) . "'>Ver</a>";
				}
			}
			
		});

		return $collection->make();
	}

	public function getDatatableCliente()
	{
		//echo Session::get('idCliente');
		$collection = Datatable::collection($this->repository->invoicesForCustomer(Session::get('idCliente')))
			->showColumns('created_at','client_id','finish')
			->searchColumns('created_at', 'client_id','finish')
			->orderColumns('created_at', 'client_id','finish');

		
		$collection->addColumn('created_at', function($model)
		{
			return date("Y-m-d H:i:s",strtotime($model->created_at));
		});

		$collection->addColumn('client_id', function($model)
		{
			 return $model->client->nombre;
		});

		$collection->addColumn('finish', function($model)
		{
			 return $this->repository->getStatus($model);
		});
		
		$collection->addColumn('Acciones',function($model){
			$links = '';

			if(Auth::check() AND Auth::user()->rol == 'cliente') {
				foreach ($model->pedidos as $pedido) {
					return $links .= "<a href='" . route('pedidos.index', $model->id) . "'>Ver</a>";
				}
			}
			
		});

		return $collection->make();
	}
}
