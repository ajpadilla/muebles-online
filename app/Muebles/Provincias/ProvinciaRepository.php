<?php namespace Muebles\Provincias;

use Muebles\Provincias\Provincia;

class ProvinciaRepository{

	public function getAll(){
		return Provincia::all();
	}

	public function save(Provincia $provincia){
		return $provincia->save();
	}

	public function getByPoblacion($poblacionId){
		return Provincia::wherePoblacionId($poblacionId)->orderBy('nombre', 'ASC');
	}

}