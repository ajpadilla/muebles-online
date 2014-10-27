<?php namespace Muebles\Poblaciones;
use Eloquent;

class Poblacion extends Eloquent{
	protected $table = 'poblaciones';
	protected $fillable = ['nombre'];

	public function provincias()
	{
		return $this->hasMany('Muebles\Provincia\Provincia');
	}

}