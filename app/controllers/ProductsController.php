<?php

use Muebles\Core\CommandBus;
use Muebles\Forms\ProductRegistrationForm;
use Muebles\Products\Product;
use Muebles\Products\ProductRepository;
use Muebles\Products\RegisterProductCommand;
use Muebles\Forms\EditProductForm;

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

	private $editProductForm;
	/**
	 * @param ProductRegistrationForm $productRegistrationForm
	 * @param ProductRepository $repository
	 */
	function __construct(ProductRegistrationForm $productRegistrationForm, ProductRepository $repository,EditProductForm $editProductForm)
	{
		$this->productRegistrationForm = $productRegistrationForm;
		$this->repository = $repository;
		$this->editProductForm = $editProductForm;
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
		$product = $this->execute(new RegisterProductCommand($codigo, $nombre, $descripcion, $medidas, $precio_lacado, $precio_lacado_puntos, $precio_pulimento, $precio_pulimento_puntos, $cantidad));
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
	public function show($id, $photoId = null)
	{
		$product = Product::findOrFail($id);

		$startAt = 0;
		foreach($product->photos as $photo) {
			if ($photo->id != $photoId)
				$startAt ++;
			else
				break;
	    }

		return View::make('products.view', compact('product', 'photoId', 'startAt'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);
		//var_dump($product);
		return View::make('products.edit',compact('product'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->editProductForm->validate(Input::all());
		$product = Product::find($id);
		$product->codigo = Input::get('codigo');
		$product->nombre = Input::get('nombre');
		$product->descripcion = Input::get('descripcion');
		$product->medidas = Input::get('medidas');
		$product->precio_lacado = Input::get('precio_lacado');
		$product->precio_lacado_puntos = Input::get('precio_lacado_puntos');
		$product->precio_pulimento = Input::get('precio_pulimento');
		$product->precio_pulimento_puntos = Input::get('precio_pulimento_puntos');
		$product->cantidad = Input::get('cantidad');
		$product->save();
		Flash::message('Otro producto ha sido actualizado con éxito!');
		return Redirect::to('products');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();
		Flash::message('producto borrado  con éxito!');
		return Redirect::to('products');
	}

	/**
	 * Get datatable data for datatables package
	 *
	 * @return mixed
	 */
	public function getDatatable()
	{
		$collection = Datatable::collection($this->repository->getAll());
		$collection->addColumn('foto', function($model)
		{
			$links = '';
			$i = 0;
			foreach ($model->photos as $photo) {
				if ($i < 3) {
					$links .= "<a href='" . route('products.show', [$model->id, $photo->id]) . "'>
								<img class='mini-photo' alt='" . $photo->filename . "' src='" . asset($photo->path . $photo->filename) . "'>
							</a>";
				} else {
					break;
				}
				$i++;
			}
			return $links;
		});

		$collection->addColumn('codigo', function($model)
		{
			return strtoupper($model->codigo);
		});

		$collection->addColumn('nombre', function($model)
		{
			return ucfirst(strtolower($model->nombre));
		});

		$collection->addColumn('medidas', function($model)
		{
			return $model->medidas;
		});

		$collection->addColumn('ver', function($model)
		{
			if(Auth::check() AND Auth::user()->isAdmin()) {
				$links = "<a href='" . route('products.edit', $model->id) . "'>Editar</a>
					<br />
					<a href='" . URL::to('borrarProduct/'.$model->id) . "'>Eliminar</a>
					<br />
					<a href='" . route('photos.create', $model->id) . "'>Agregar Fotos</a>";
				return $links;
			}
		});

		$collection->searchColumns('nombre', 'codigo');
		$collection->orderColumns('codigo','nombre');

		return $collection->make();
	}

	/**
	 * @param $filterWord
	 * @return mixed
	 */
	public function filteredProducts()
	{
		$filterWord = (Input::has('filter_word') ? Input::get('filter_word') : '');
		//aquí van los productos que encuentre de la búsqueda, y el método filterProducts tiene que hacerlo dentro del ProductRepository
		$products = $this->repository->filterProducts($filterWord);
		if (!$products->isEmpty()) {
			return View::make('products.filtered-products', compact('products'));
		}else{
			Flash::warning('No se encontraron productos que coincidan con la información suministrada para la búsqueda: '.$filterWord);
			return Redirect::intended();
		}
	}
}
