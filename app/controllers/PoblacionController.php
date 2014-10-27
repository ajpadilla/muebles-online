<?php
use Muebles\Poblaciones\Poblacion;
use Muebles\Forms\PoblacionRegistrationForm;

class PoblacionController extends \BaseController {


	private $poblacionRegistrationForm;

	function __construct(PoblacionRegistrationForm $poblacionRegistrationForm) {
		$this->poblacionRegistrationForm = $poblacionRegistrationForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$poblaciones = Poblacion::all();
		return View::make('poblaciones.index',compact('poblaciones'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('poblaciones.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->poblacionRegistrationForm->validate(Input::all());

		Poblacion::create(Input::only('nombre'));
		return Redirect::route('poblaciones_path');
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
