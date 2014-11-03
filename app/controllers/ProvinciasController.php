<?php

use Muebles\Provincias\Provincia;
use Muebles\Poblaciones\Poblacion;
use Muebles\Provincias\ProvinciaRepository;
use Muebles\Forms\ProvinciasRegistration;
use Muebles\Ciudades\Ciudad;

class ProvinciasController extends \BaseController {

	private $provinciasRegistration;
	private $provinciaRepository;

	function __construct(ProvinciasRegistration $provinciasRegistration, ProvinciaRepository $provinciaRepository) {
		$this->provinciasRegistration = $provinciasRegistration;
		$this->provinciaRepository = $provinciaRepository;
		//$this->beforeFilter('admin');
	}

	public function cargarProvincias()
	{
		set_time_limit(600);
		echo count(Ciudad::all()).'<br>';
		echo (count(Ciudad::all())/2).'<br>';
		foreach (Ciudad::all() as $key => $ciudad) {
			if ($key <= 12846) {
				echo $key.'<br>';
				$provincia = new Provincia;
				$provincia->nombre = $ciudad->s_name;
				$provincia->poblacion_id = $ciudad->fk_i_region_id;
				$provincia->save();
			}
		}

		echo "Provincias Cargardas";
	}


	public function cargarProvincias2()
	{
		set_time_limit(600);

		echo count(Ciudad::all()).'<br>';
		echo (count(Ciudad::all())/2).'<br>';
		foreach (Ciudad::all() as $key => $ciudad) {
			if ($key > 12846) {
				echo $key.'<br>';
				$provincia = new Provincia;
				$provincia->nombre = $ciudad->s_name;
				$provincia->poblacion_id = $ciudad->fk_i_region_id;
				$provincia->save();
			}
		}

		echo "Provincias 2 Cargardas";
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
