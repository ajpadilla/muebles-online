<?php namespace Muebles\Provincias;

use Eloquent;

class Provincia extends Eloquent{
	protected $table = 'provincias';
	protected $fillable = ['nombre','poblacion_id'];

	public function poblacion(){
		 return $this->belongsTo('Muebles\Poblaciones\Poblacion');
	}

}
