<?php namespace Muebles\Provincias;

use Muebles\Provincias\Provincia;

class ProvinciaRepository{

	public function getAll(){
		return Provincia::all();
	}

}