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
		Session::put('facturaId',$facturaId);
		return View::make('pedidos.index');
	}

	public function create($productId){
		$product = $this->productRepository->get($productId);
		return View::make('pedidos.create', compact('product'));
	}

	public function getDatatable()
	{
		//return Session::get('facturaId');
		$collection = Datatable::collection($this->repository->ordersForInvoice(Session::get('facturaId')))
			->showColumns('color','cantidad','observacion')
			->searchColumns('Fecha del pedido')
			->orderColumns('Fecha del pedido');

		
		$collection->addColumn('Fecha del pedido', function($model)
		{
			return date("Y-m-d H:i:s",strtotime($model->created_at));
		});

		$collection->addColumn('Codigo del pedido', function($model)
		{
			$links = '';
			return $links .= "<a href='" . route('products.show', $model->product->id) . "'>Ver</a>";
		});


		return $collection->make();

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
