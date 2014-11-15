<?php

use Laracasts\Validation\FormValidationException;
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

	public function index($facturaId) {
		$user = Auth::user();

		if($user->isClient())
			$factura = $user->facturas()->find($facturaId);
		else
			$factura = Factura::find($facturaId);

		if (!$factura || $factura->pedidos->count() == 0) {
			Flash::warning("No hay pedidos!");
			return Redirect::intended();
		}else{
			return View::make('pedidos.index',compact('factura'));
		}
	}

	public function create($productId){
		$product = $this->productRepository->get($productId);
		return View::make('pedidos.create', compact('product'));
	}

	public function getDatatable($facturaId)
	{
		$collection = Datatable::collection($this->repository->ordersForInvoice($facturaId))
			->showColumns('created_at')
			->searchColumns('created_at')
			->orderColumns('created_at');

		
		$collection->addColumn('created_at', function($model)
		{
			return date("Y-m-d H:i:s",strtotime($model->created_at));
		});

		$collection->addColumn('Codigo del pedido', function($model)
		{
			return "<a href='" . route('products.show', $model->product->id) . "'>".$model->product->codigo."</a>";
		});

		$collection->addColumn('color', function($model)
		{
			return $model->color;
		});

		$collection->addColumn('cantidad', function($model)
		{
			return $model->cantidad;
		});

		$collection->addColumn('descripcion', function($model)
		{
			return $model->observacion;
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

		try
		{
			$this->registerRequestForm->validate($formData);
			$nombre_cliente = null;
			$direccion = null;
			extract($formData);
			$product = $this->productRepository->get($product_id);

			if(!$direccion)
				$direccion = Auth::user()->direccion;
			$this->execute(new RegisterPedidoCommand($product, $factura, $cantidad, $color, $observacion, $nombre_cliente, $direccion));

			if($formData['do'] == 1) {
				$flashMsg = 'Su pedido ha sido procesado con éxito!';
				Flash::success($flashMsg);
				return Response::json(['success' => true, 'flashMsg' => $flashMsg]);
				//return Redirect::to(route('products.index'));
			}

			if(!Session::has('factura'))
			{
				$flashMsg = 'No tiene productos para realizar el pedido, por favor, agregue un producto!';
				Flash::warning($flashMsg);
				return Response::json(['success' => false, 'flashMsg' => $flashMsg]);
				//return Redirect::to(route('products.index'));
			}

			Session::forget('factura');
			Flash::success('Su pedido ha sido procesado con éxito!');
			return Response::json(['success' => true, 'redirect' => route('facturas.show', $factura->id)]);
		}
		catch (FormValidationException $e)
		{
			$response = ['success' => false, 'errors' => $e->getErrors()];
			return Response::json($response);
		}
	}
}
