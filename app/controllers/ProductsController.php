<?php

use Muebles\Core\CommandBus;
use Muebles\Forms\ProductRegistrationForm;
use Muebles\Products\Product;
use Muebles\Products\ProductRepository;
use Muebles\Products\RegisterProductCommand;

class ProductsController extends \BaseController {

	use CommandBus;

	/**
	 * @var ProductRepository
	 */
	private $repository;

	/**
	 * @var ProductRegistrationForm
	 */
	private $productRegistrationForm;

	/**
	 * @param ProductRegistrationForm $productRegistrationForm
	 * @param ProductRepository $repository
	 */
	function __construct(ProductRegistrationForm $productRegistrationForm, ProductRepository $repository)
	{
		$this->productRegistrationForm = $productRegistrationForm;
		$this->repository = $repository;
		$this->beforeFilter('admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->repository->getAll();
		return View::make('products.index', compact('products'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::all();
		$this->productRegistrationForm->validate($formData);
		extract($formData);
		$product = $this->execute(new RegisterProductCommand($codigo, $nombre, $descripcion, $medidas, $precio_lacado, $precio_lacado_puntos, $precio_pulimento, $precio_pulimento_puntos, $cantidad, $precio));
		Flash::success('El mueble ha sido registrado con éxito!');
		if($formData['do'] == 1) {
			$id = $product->id;
			return Redirect::route('photos.create', compact('id'));
		}
		return Redirect::route('products.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return View::make('products.view', compact('product'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Get datatable data for datatables package
	 *
	 * @return mixed
	 */
	public function getDatatable()
	{
		$collection = Datatable::collection($this->repository->getAll());
			//->showColumns('codigo', 'nombre', 'modelo', 'medidas', 'lacado', 'precio_lacado', 'pulimento', 'precio_pulimento', 'cantidad', 'precio')

		$collection->addColumn('foto', function($model)
		{
			foreach ($model->photos as $photo) {
				$links = "<a href='" . route('products.show', $model->id) . "'>
						<img class='mini-photo' alt='" . $photo->filename . "' src='" . asset($photo->path . $photo->filename) . "'>
					</a>
					<br />";

				return $links;
			}
		});

		$collection->addColumn('codigo', function($model)
		{
			return strtoupper($model->codigo);
		});

		$collection->addColumn('nombre', function($model)
		{
			return ucfirst(strtolower($model->nombre));
		});

/*		$collection->addColumn('modelo', function($model)
		{
			return strtoupper($model->modelo);
		});*/

		$collection->addColumn('medidas', function($model)
		{
			return $model->medidas;
		});

		/*$collection->addColumn('lacado', function($model)
		{
			return ($model->lacado == 1) ? 'Si' : 'No';
		});

		$collection->addColumn('precio_lacado', function($model)
		{
			return number_format($model->precio_lacado, 2, ',', '.');
		});

		$collection->addColumn('pulimento', function($model)
		{
			return ($model->pulimento == 1) ? 'Si' : 'No';
		});

		$collection->addColumn('precio_pulimento', function($model)
		{
			return number_format($model->precio_pulimento, 2, ',', '.');
		});

		$collection->addColumn('cantidad', function($model)
		{
			return $model->cantidad;
		});

		$collection->addColumn('precio', function($model)
		{
			return number_format($model->precio, 2, ',', '.');
		});*/

		$collection->addColumn('ver', function($model)
		{
			$links = "<a href='" . route('products.show', $model->id) . "'>Ver</a>
					<br />";

			if(Auth::check() AND Auth::user()->rol == 'admin') {
				$links .= "<a href='" . route('products.edit', $model->id) . "'>Editar</a>
					<br />
					<a href='" . route('products.destroy', $model->id) . "'>Eliminar</a>";
			}

			return $links;
		});

		$collection->searchColumns('nombre', 'codigo');
		$collection->orderColumns('codigo','nombre');

		return $collection->make();
	}
}
