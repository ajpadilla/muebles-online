<?php

use Muebles\Core\CommandBus;
use Muebles\Pedidos\PedidosRepository;
use Muebles\Pedidos\RegisterPedidoCommand;
use Muebles\Products\ProductRepository;

class PedidosController extends \BaseController {

	use CommandBus;

	private $productRepository;

	private $repository;

	/**
	 * @param Product $productRepository
	 */
	function __construct(ProductRepository $productRepository, PedidosRepository $repository)
	{
		$this->productRepository = $productRepository;
		$this->repository = $repository;
		$this->beforeFilter('auth');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($productId)
	{
		if(Auth::check() && Auth::user()->isClient()) {
			$product = $this->productRepository->get($productId);
			$pedido = $this->execute(new RegisterPedidoCommand($product, Auth::user()));
			Flash::success('Su pedido ha sido procesado con éxito!');
			return Redirect::intended(route('products.index'));
		}
	}

	public function show($id){
		$pedido = $this->repository->get($id);
		$fileName = $pedido->client->nombre. '-' . $pedido->product->codigo . '.pdf';
		return PDF::loadView('pedidos.pedido-realizado-pdf', compact('pedido'))->stream($fileName);
	}
}
