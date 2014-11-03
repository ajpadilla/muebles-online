<?php namespace Muebles\Regiones;

use Eloquent;

class Region extends Eloquent{
	protected $table = 't_region';
	protected $fillable = ['pk_i_id','s_name'];
}
