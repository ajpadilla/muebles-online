<?php namespace Muebles\Poblaciones;

use Muebles\Poblaciones\Poblacion;

class PoblacionesReposotory{

	public function getAll(){
		return Poblacion::all();
	}

	public function save(Poblacion $poblacion){
		return $poblacion->save();
	}
}