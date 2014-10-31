<?php namespace Muebles\Pedidos;

use Carbon\Carbon;
use Eloquent;
use Laracasts\Commander\Events\EventGenerator;

class Pedido extends Eloquent {

	use EventGenerator;

	protected $softDelete = true;

	public function product(){
		return $this->belongsTo('Muebles\Products\Product');
	}

	public function factura(){
		return $this->belongsTo('Muebles\Facturas\Factura');
	}

	public function getCreatedAtAttribute($date) {
		return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
	}
}