<?php namespace Muebles\Facturas; 

use Eloquent;

class Factura extends Eloquent{
	protected $fillable = [];

	public function pedidos(){
		return $this->hasMany('Muebles\Pedidos\Pedido');
	}

	public function client(){
		return $this->belongsTo('Muebles\Users\User', 'client_id');
	}
}