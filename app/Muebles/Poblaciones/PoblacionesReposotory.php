<?php namespace Muebles\Poblaciones;

use Muebles\Poblaciones\Poblacion;

class PoblacionesReposotory{

	public function getAll(){
		return Poblacion::all();
	}

}