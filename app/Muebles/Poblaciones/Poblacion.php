<?php namespace Muebles\Poblaciones;
use Eloquent;

class Poblacion extends Eloquent{
	protected $table = 'poblaciones';
	protected $fillable = ['nombre'];

}