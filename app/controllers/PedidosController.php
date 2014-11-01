<?php

use Muebles\Core\CommandBus;
use Muebles\Facturas\Factura;
use Muebles\Forms\RegisterRequestForm;
use Muebles\Pedidos\PedidosRepository;
use Muebles\Pedidos\RegisterPedidoCommand;
use Muebles\Products\ProductRepository;

class PedidosController extends \BaseController {

	use CommandBus;

	private $productRepository;

	private $repository;
	/**
	 * @var RegisterRequestForm
	 */
	private $registerRequestForm;


	/**
	 * @param ProductRepository|Product $productRepository
	 * @param PedidosRepository $repository
	 * @param RegisterRequestForm $registerRequestForm
	 */
	function __construct(ProductRepository $productRepository, PedidosRepository $repository, RegisterRequestForm $registerRequestForm)
	{
		$this->productRepository = $productRepository;
		$this->repository = $repository;
		$this->beforeFilter('auth');
		$this->registerRequestForm = $registerRequestForm;
	}

	public function index($facturaId){
		echo $facturaId;
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
		if(!Session::has('factura'))
		{
			$factura = new Factura();
			$factura->client()->associate(Auth::user());
			Session::put('factura', $factura);
		} else {
			$factura = Session::get('factura');
		}
		$factura->save();
		$formData = Input::all();
		$this->registerRequestForm->validate($formData);
		extract($formData);
		$product = $this->productRepository->get($product_id);
		$pedido = $this->execute(new RegisterPedidoCommand($product, $factura, $cantidad, $color, $observacion));
		Flash::success('Su pedido ha sido procesado con éxito!');
		if($formData['do'] == 1) {
			return Redirect::to(route('products.index'));
		}
		if(!Session::has('factura'))
		{
			Flash::warning('No tiene productos para realizar el pedido, por favor, agregue un producto!');
			return Redirect::to(route('products.index'));
		}
		Session::forget('factura');
		return Redirect::to(route('facturas.show', $factura->id));
	}
}
