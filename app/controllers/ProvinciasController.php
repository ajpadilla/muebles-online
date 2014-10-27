<?php

use Muebles\Provincias\Provincia;
use Muebles\Poblaciones\Poblacion;
use Muebles\Forms\ProvinciasRegistration;

class ProvinciasController extends \BaseController {

	private $provinciasRegistration;

	function __construct(ProvinciasRegistration $provinciasRegistration) {
		$this->provinciasRegistration = $provinciasRegistration;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provincias = Provincia::all();
		return View::make('provincias.index',compact('provincias'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$poblaciones = Poblacion::all()->lists('nombre', 'id');
		return View::make('provincias.create',compact('poblaciones'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->provinciasRegistration->validate(Input::all());
		Provincia::create(Input::only('nombre','poblacion_id'));
		return Redirect::route('provincias_path');
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


}
