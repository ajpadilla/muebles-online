<?php

use Muebles\Core\CommandBus;
use Muebles\Forms\ProductRegistrationForm;
use Muebles\Products\ProductRepository;
use Muebles\Products\RegisterProductCommand;

class ProductsController extends \BaseController {

	use CommandBus;

	/**
	 * @var ProductRegistrationForm
	 */
	private $productRegistrationForm;
	/**
	 * @var ProductRepository
	 */
	private $repository;

	/**
	 * @param ProductRegistrationForm $productRegistrationForm
	 * @param ProductRepository $repository
	 */
	function __construct(ProductRegistrationForm $productRegistrationForm, ProductRepository $repository)
	{
		$this->productRegistrationForm = $productRegistrationForm;
		$this->repository = $repository;
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
		$product = $this->execute(new RegisterProductCommand($codigo, $nombre, $descripcion, $modelo, $medidas, $lacado, $precio_lacado, $pulimento, $precio_pulimento, $cantidad, $precio));
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
		//
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
		$collection = Datatable::collection($this->repository->getAll())
			->showColumns('codigo', 'nombre', 'modelo', 'medidas', 'lacado', 'precio_lacado', 'pulimento', 'precio_pulimento', 'cantidad', 'precio')
			->searchColumns('nombre', 'codigo')
			->orderColumns('codigo','nombre', 'modelo');

		$collection->addColumn('lacado', function($model)
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

		$collection->addColumn('precio', function($model)
		{
			return number_format($model->precio, 2, ',', '.');
		});

		return $collection->make();
	}
}
