<?php namespace Muebles\Ciudades;

use Eloquent;

class Ciudad extends Eloquent{
	protected $table = 't_city';
	protected $fillable = ['fk_i_region_id','s_name'];
}