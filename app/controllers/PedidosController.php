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

	public function index(){

	}

	public function create($productId){
		$product = $this->productRepository->get($productId);
		return View::make('pedidos.create', compact('product'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::all();
		$this->registerRequestForm->validate($formData);
		extract($formData);
		$product = $this->productRepository->get($product_id);
		$pedido = $this->execute(new RegisterPedidoCommand($product, Auth::user(), $cantidad, $color));
		Flash::success('Su pedido ha sido procesado con éxito!');
		if($formData['do'] == 1) {
			return Redirect::to(route('products.index'));
		}
		return Redirect::route('finish_request_path');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function finishRequest()
	{

	}

	public function show($id){
		$pedido = $this->repository->get($id);
		$fileName = $pedido->client->nombre. '-' . $pedido->product->codigo . '.pdf';
		return PDF::loadView('pedidos.pedido-realizado-pdf', compact('pedido'))->stream($fileName);
	}
}
