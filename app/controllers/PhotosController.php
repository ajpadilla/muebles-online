<?php

use Muebles\Photos\Photo;
use Muebles\Products\Product;

class PhotosController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('admin');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($productId)
	{
		$product = Product::findOrFail($productId);
		if($product->photos)
			return View::make('photos.index', compact('product'));
		Flash::warning('El producto seleccionado no tiene fotos!');
		return Redirect::intended();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($productId)
	{
		$product = Product::findOrFail($productId);
		$nombre = $product->nombre;
		$codigo = $product->codigo;
		return View::make('photos.create', compact('productId', 'nombre', 'codigo'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
			$file = Input::file('file');
			$productId = Input::get('product_id');
			$photo = new Photo();
			$photo->register($file, $productId, Auth::user()->id);
		} catch(Exception $exception){
			// Something went wrong. Log it.
			Log::error($exception);
			// Return error
			return Response::json($exception->getMessage(), 400);
		}

		// If it now has an id, it should have been successful.
		if ( $photo->id ) {
			return Response::json(array('status' => 'success', 'file' => $photo->toArray()), 200);
		} else {
			return Response::json('Error', 400);
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
		$photo = Photo::findOrFail($id);
		$productId = $photo->product()->first()->id;
		File::delete($photo->complete_thumbnail_path);
		File::delete($photo->complete_path);
		$photo->delete();
		Flash::success('Foto eliminada con éxito!');
		return Redirect::to(route('photos.index', $productId));
	}


}
