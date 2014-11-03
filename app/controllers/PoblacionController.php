<?php
use Muebles\Poblaciones\Poblacion;
use Muebles\Poblaciones\PoblacionesReposotory;
use Muebles\Forms\PoblacionRegistrationForm;
use Muebles\Regiones\Region;

class PoblacionController extends \BaseController {


	private $poblacionRegistrationForm;
	private $poblacionReposotory;

	function __construct(PoblacionRegistrationForm $poblacionRegistrationForm,PoblacionesReposotory $poblacionReposotory){
		$this->poblacionRegistrationForm = $poblacionRegistrationForm;
		$this->poblacionReposotory = $poblacionReposotory;
		$this->beforeFilter('admin');
	}

	public function cargarPoblaciones()
	{
		$regiones = Region::all();
		//var_dump($regiones);
		foreach ($regiones as $key => $region) {
			$poblacion = new Poblacion;
			$poblacion->id = $region->pk_i_id;
			$poblacion->nombre = $region->s_name;
			$this->poblacionReposotory->save($poblacion);
		}
		echo "Poblaciones cargadas";
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
